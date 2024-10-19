<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilePackage;
use App\Models\Package;
use Carbon\Carbon;


class ProfilePackagesController extends Controller
{
    
    public function purchasePackage(Request $request){
        $validated = $request->validate([
            'package_id'=>'required',
        ]);

        $package = Package::find($validated['package_id']);
         if(!$package){
             return redirect()->back()->with('error','package not found');
         }

         $latestUserPackage = auth()->user()->profile->profilePackages()
         ->withPivot('tokens_received', 'tokens_used', 'starts_at', 'expires_at')
          ->orderBy('expires_at', 'desc')
          ->first();
          if($latestUserPackage && $latestUserPackage->pivot->expires_at > now()){
            $startsAt = $latestUserPackage->pivot->expires_at;
          }
          else{
              $startsAt = now();
          }
          $startsAt = Carbon::parse($startsAt);


          $profilePackages = new ProfilePackage();
          $profilePackages->profile_id = auth()->user()->profile->id;
          $profilePackages->package_id = $package->id;
          $profilePackages->tokens_received = $package->tokens;
          $profilePackages->tokens_used = 0;
          $profilePackages->starts_at = $startsAt;
          $profilePackages->expires_at = $startsAt->copy()->addDays($package->validity);
          $profilePackages->save();

          $this->updateTotalTokens(auth()->user()->profile->id);

          return redirect()->back();
    }

    private function updateTotalTokens($profileId){
         
        $totalTokens = ProfilePackage::where('profile_id', $profileId)
        ->where('expires_at', '>', now())
        ->get()
        ->sum(function($package){
            return $package->tokens_received - $package->tokens_used;
        });

         auth()->user()->profile->update(['available_tokens'=> $totalTokens]);
    }


    public function useTokens(){
        //later
    }

    
}