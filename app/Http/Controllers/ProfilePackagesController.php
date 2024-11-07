<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Profile;
use App\Models\ProfilePackage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfilePackagesController extends Controller
{
    public function show_interest(Request $request)
    {
        $interestUserId = $request->interest_id;
        $interestProfile = Profile::find($interestUserId);

        if (!$interestProfile) {
            return redirect()->back()->with('error', 'profile does not exists');
        }

        $profile = auth()->user()->profile;
        $tokenToUse = 500;
        // $this->useTokens($tokenToUse);
        if (!$this->useTokens($tokenToUse)) {
            dd('not enought token');
            return redirect()->back()->with('error', 'Not enough tokens to add to interests');
        }

        $message = 'Tokens Available ' . $profile->available_tokens;
        $profile->interestProfiles()->attach($interestProfile->id);

        // return response()->json(['message' => 'added to interests']);
        return redirect()->back()->with('success', $message);
    }

    public function purchasePackage(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'required',
        ]);

        $package = Package::find($validated['package_id']);
        if (!$package) {
            return redirect()->back()->with('error', 'package not found');
        }

        $latestUserPackage = auth()
            ->user()
            ->profile
            ->profilePackages()
            ->withPivot('tokens_received', 'tokens_used', 'starts_at', 'expires_at')
            ->orderBy('expires_at', 'desc')
            ->first();
        if ($latestUserPackage && $latestUserPackage->pivot->expires_at > now()) {
            $startsAt = $latestUserPackage->pivot->expires_at;
        } else {
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

    private function updateTotalTokens($profileId)
    {
        $totalTokens = ProfilePackage::where('profile_id', $profileId)
            ->where('expires_at', '>', now())
            ->get()
            ->sum(function ($package) {
                return $package->tokens_received - $package->tokens_used;
            });

        auth()->user()->profile->update(['available_tokens' => $totalTokens]);
    }

    // public function useTokens(){
    //     //later
    // }

    public function useTokens(string $tokenToUse)
    {
        $userPackages = auth()
            ->user()
            ->profile
            ->profilePackages()
            ->where('expires_at', '>', now())
            ->orderBy('expires_at')
            ->get();

        $tokensAvailable = 0;
        $tokensAvail = 0;
        //  start
        foreach ($userPackages as $userPackage) {
            $availTokens = $userPackage->pivot->tokens_received - $userPackage->pivot->tokens_used;
            $tokensAvail += $availTokens;
        }

        // If the total available tokens are less than what the user requested, return false
        if ($tokensAvail < $tokenToUse) {
            return false;  // Not enough tokens
        }
        // end

        foreach ($userPackages as $userPackage) {
            $availableTokens = $userPackage->pivot->tokens_received - $userPackage->pivot->tokens_used;
            $tokensAvailable += $availableTokens;

            if ($tokensAvailable >= $tokenToUse) {
                $userPackage->pivot->tokens_used += $tokenToUse;

                $userPackage->pivot->save();  // issue
                // dd($userPackage->pivot->package_id);
                //  $userPackage->profile()->profilePackages->updateExistingPivot($userPackage->pivot->package_id, [
                //     'tokens_used' => $tt
                // ]);
                //   $p = ProfilePackage::find($userPackage->pivot->package_id);
                //   $p->tokens_used = $tt;
                //   $p->save();

                $this->updateTotalTokens(auth()->user()->profile->id);

                return true;
            } else {
                $tokenToUse -= $availableTokens;
                $userPackage->pivot->tokens_used = $userPackage->pivot->tokens_received;
                $userPackage->pivot->save();
            }
        }
        return false;
    }

    // public function useTokens(string $tokenToUse)
    // {
    //     // Get the user's profile packages that are not expired
    //     $userPackages = auth()->user()->profile->profilePackages()
    //         ->where('expires_at', '>', now())
    //         ->orderBy('expires_at')
    //         ->get();

    //     $tokensAvailable = 0;
    //     $totalTokensToUse = $tokenToUse;  // Track the initial requested tokens

    //     // First, calculate the total available tokens in all packages
    //     foreach ($userPackages as $userPackage) {
    //         $availableTokens = $userPackage->pivot->tokens_received - $userPackage->pivot->tokens_used;
    //         $tokensAvailable += $availableTokens;
    //     }

    //     // If the total available tokens are less than what the user requested, return false
    //     if ($tokensAvailable < $tokenToUse) {
    //         return false;  // Not enough tokens
    //     }

    //     // Now, loop through the packages to deduct tokens
    //     foreach ($userPackages as $userPackage) {
    //         $availableTokens = $userPackage->pivot->tokens_received - $userPackage->pivot->tokens_used;

    //         if ($availableTokens >= $tokenToUse) {
    //             // If there are enough tokens in this package, use them
    //             $userPackage->pivot->tokens_used += $tokenToUse;
    //             $userPackage->pivot->save();  // Save the updated pivot data

    //             // After using tokens, exit because we used enough tokens
    //             $this->updateTotalTokens(auth()->user()->profile->id);
    //             return true;
    //         } else {
    //             // If there are not enough tokens in this package, use all remaining tokens in this package
    //             $tokenToUse -= $availableTokens;  // Subtract the used tokens from the requested tokens
    //             $userPackage->pivot->tokens_used = $userPackage->pivot->tokens_received;  // Mark all tokens as used
    //             $userPackage->pivot->save();  // Save the updated pivot data
    //         }
    //     }

    //     // If we exit the loop, it means there are still remaining tokens to be used but no more packages available
    //     return false;  // Not enough tokens
    // }
}