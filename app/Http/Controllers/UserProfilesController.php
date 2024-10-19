<?php

namespace App\Http\Controllers;

use App\Models\Caste;
use App\Models\Package;
use App\Models\Profile;
use App\Models\SubCaste;
use Illuminate\Http\Request;
use App\Models\ProfilePackage;
use App\Http\Requests\Default\UpdateProfileRequest;

class UserProfilesController extends Controller
{
    public function view_profile()
    {
        $profiles = Profile::all();
        $user = auth()->user()->profile()->first();
        return view('default.view.profile.view_profile.create', ['user' => $user,'profiles'=>$profiles]);
    }

    public function basic_details()
    {
        $user = auth()->user()->profile()->first();
        return view('default.view.profile.basic_details.index', ['user' => $user]);
    }

    public function religious_details()
    {
        $user = auth()->user()->profile()->first();
        $castes = Caste::all();
        $subCastes = SubCaste::all();
        return view('default.view.profile.religious_details.create', ['user' => $user, 'castes' => $castes, 'subCastes' => $subCastes]);
    }

    public function family_details()
    {
        $user = auth()->user()->profile()->first();
        return view('default.view.profile.family_details.create', ['user' => $user]);
    }

    public function astronomy_details()
    {
        $user = auth()->user()->profile()->first();
        return view('default.view.profile.astronomy_details.create', ['user' => $user]);
    }

    public function educational_details()
    {
        $user = auth()->user()->profile()->first();
        return view('default.view.profile.educational_details.create', ['user' => $user]);
    }

    public function occupation_details()
    {
        $user = auth()->user()->profile()->first();
        return view('default.view.profile.occupation_details.create', ['user' => $user]);
    }

    public function contact_details()
    {
        $user = auth()->user()->profile()->first();
        return view('default.view.profile.contact_details.create', ['user' => $user]);
    }

    public function life_partner()
    {
        $user = auth()->user()->profile()->first();
        return view('default.view.profile.life_partner.create', ['user' => $user]);
    }

    //  ->where(function ($query) use ($data) {
    //     $query->whereHas('Manager', function ($query) use ($data) {
    //         $query->where('name', 'like', "%$data%");
    //     })
    //     ->orWhereHas('Manager.AreaManager', function ($query) use ($data) {
    //         $query->where('name', 'like', "%$data%");
    //     })
    //     ->orWhereHas('Manager.ZonalManager', function ($query) use ($data) {
    //         $query->where('name', 'like', "%$data%");
    //     });
    //    })
       
    public function user_packages()
    {
        $user = auth()->user()->profile()->first();
        $purchased_packages = auth()->user()->profile->profilePackages()
        ->withPivot('tokens_received', 'tokens_used', 'starts_at', 'expires_at')
        ->where('expires_at', '>', now())
        ->get();
        
        $packages = Package::all();
        return view('default.view.profile.user_packages.create', ['user' => $user, 'packages' => $packages,'purchased_packages'=>$purchased_packages]);

     }

    public function store(UpdateProfileRequest $request)
    {  
        if($request->hasFile('img_1')){
            $img_1FileNameWithExtention = $request->file('img_1')->getClientOriginalName();
            $img_1Filename = pathinfo($img_1FileNameWithExtention, PATHINFO_FILENAME);
            $img_1Extention = $request->file('img_1')->getClientOriginalExtension();
            $img_1FileNameToStore = $img_1Filename.'_'.time().'.'.$img_1Extention;
            $img_1Path = $request->file('img_1')->storeAs('public/images', $img_1FileNameToStore);
         }

         if($request->hasFile('img_2')){
            $img_2FileNameWithExtention = $request->file('img_2')->getClientOriginalName();
            $img_2Filename = pathinfo($img_2FileNameWithExtention, PATHINFO_FILENAME);
            $img_2Extention = $request->file('img_2')->getClientOriginalExtension();
            $img_2FileNameToStore = $img_2Filename.'_'.time().'.'.$img_2Extention;
            $img_2Path = $request->file('img_2')->storeAs('public/images', $img_2FileNameToStore);
         }

         if($request->hasFile('img_3')){
            $img_3FileNameWithExtention = $request->file('img_3')->getClientOriginalName();
            $img_3Filename = pathinfo($img_3FileNameWithExtention, PATHINFO_FILENAME);
            $img_3Extention = $request->file('img_3')->getClientOriginalExtension();
            $img_3FileNameToStore = $img_3Filename.'_'.time().'.'.$img_3Extention;
            $img_3Path = $request->file('img_3')->storeAs('public/images', $img_3FileNameToStore);
         }
         
        $data = $request->validated();
        if($request->hasFile('img_1')){
         $data['img_1'] = $img_1FileNameToStore;
            
        }

        if($request->hasFile('img_2')){
            $data['img_2'] = $img_2FileNameToStore;               
           }

           if($request->hasFile('img_3')){
            $data['img_3'] = $img_3FileNameToStore;   
           }
           $data['lens'] = $request->has('lens');
           $data['spectacles'] = $request->has('spectacles');

         
        $profile = Profile::where('user_id', auth()->user()->id)->first();

        if ($profile) {
            $profile->update($data);  // update() handles mass assignment based on fillable fields
        } else {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}