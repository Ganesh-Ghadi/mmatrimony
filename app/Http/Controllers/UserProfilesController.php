<?php

namespace App\Http\Controllers;

use App\Http\Requests\Default\UpdateProfileRequest;
use App\Models\Caste;
use App\Models\Profile;
use App\Models\SubCaste;
use Illuminate\Http\Request;

class UserProfilesController extends Controller
{
    public function view_profile()
    {
        $user = auth()->user()->profile()->first();
        return view('default.view.profile.view_profile.create', ['user' => $user]);
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

    public function user_packages()
    {
        $user = auth()->user()->profile()->first();
        return view('default.view.profile.user_packages.create', ['user' => $user]);
    }

    public function store(Request $request)
    // public function store(UpdateProfileRequest $request)
    {
        $data = $request->all();
        // dd($data);
        // Get the logged-in user's profile
        $profile = Profile::where('user_id', auth()->user()->id)->first();

        // If profile exists, update the data
        if ($profile) {
            $profile->update($data);  // update() handles mass assignment based on fillable fields
        } else {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}