<?php

namespace App\Http\Controllers\admin;

use Excel;
use Throwable;
use App\Models\User;
use App\Models\Caste;
use App\Models\Profile;
use App\Models\SubCaste;
use Illuminate\Http\Request;
use App\Imports\ImportUserProfiles;
use App\Http\Controllers\Controller;
use App\Http\Requests\Default\UpdateProfileRequest;

class ProfilesController extends Controller
{
    public function index()
    {
        $profiles = Profile::paginate(12);
        return view('admin.user_profiles.index', ['profiles' => $profiles]);
    }

    public function edit(string $id)
    {
        $profile = Profile::find($id);
        $castes = Caste::all();
        $subCastes = SubCaste::all();
        return view('admin.user_profiles.edit', ['profile' => $profile, 'castes' => $castes, 'subCastes' => $subCastes]);
    }

    // public function user_profiles()
    // {
    //     $user = auth()->user()->profile()->first();
    //     return view('admin.user_profiles.create', ['user' => $user]);
    // }


    public function update(Request $request, string $id)
    {
        // dd($id);
        // dd($request->all());
        $profile = Profile::find($id);
        if ($request->hasFile('img_1')) {
            $img_1FileNameWithExtention = $request->file('img_1')->getClientOriginalName();
            $img_1Filename = pathinfo($img_1FileNameWithExtention, PATHINFO_FILENAME);
            $img_1Extention = $request->file('img_1')->getClientOriginalExtension();
            $img_1FileNameToStore = $img_1Filename . '_' . time() . '.' . $img_1Extention;
            $img_1Path = $request->file('img_1')->storeAs('public/images', $img_1FileNameToStore);
        }
        if ($request->hasFile('img_patrika')) {
            $img_patrikaFileNameWithExtention = $request->file('img_patrika')->getClientOriginalName();
            $img_patrikaFilename = pathinfo($img_patrikaFileNameWithExtention, PATHINFO_FILENAME);
            $img_patrikaExtention = $request->file('img_patrika')->getClientOriginalExtension();
            $img_patrikaFileNameToStore = $img_patrikaFilename . '_' . time() . '.' . $img_patrikaExtention;
            $img_patrikaPath = $request->file('img_patrika')->storeAs('public/images', $img_patrikaFileNameToStore);
        }

        if ($request->hasFile('img_2')) {
            $img_2FileNameWithExtention = $request->file('img_2')->getClientOriginalName();
            $img_2Filename = pathinfo($img_2FileNameWithExtention, PATHINFO_FILENAME);
            $img_2Extention = $request->file('img_2')->getClientOriginalExtension();
            $img_2FileNameToStore = $img_2Filename . '_' . time() . '.' . $img_2Extention;
            $img_2Path = $request->file('img_2')->storeAs('public/images', $img_2FileNameToStore);
        }

        if ($request->hasFile('img_3')) {
            $img_3FileNameWithExtention = $request->file('img_3')->getClientOriginalName();
            $img_3Filename = pathinfo($img_3FileNameWithExtention, PATHINFO_FILENAME);
            $img_3Extention = $request->file('img_3')->getClientOriginalExtension();
            $img_3FileNameToStore = $img_3Filename . '_' . time() . '.' . $img_3Extention;
            $img_3Path = $request->file('img_3')->storeAs('public/images', $img_3FileNameToStore);
        }

        $data = $request->all();
        if ($request->hasFile('img_1')) {
            $data['img_1'] = $img_1FileNameToStore;
        }
        if ($request->hasFile('img_patrika')) {
            $data['img_patrika'] = $img_patrikaFileNameToStore;
        }

        if ($request->hasFile('img_2')) {
            $data['img_2'] = $img_2FileNameToStore;
        }

        if ($request->hasFile('img_3')) {
            $data['img_3'] = $img_3FileNameToStore;
        }
        $data['lens'] = $request->has('lens');
        $data['spectacles'] = $request->has('spectacles');

        if ($profile) {
            $profile->update($data);  // update() handles mass assignment based on fillable fields
        } else {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    

    public function import()
    {
        return view('admin.user_profiles.import');
    }

    public function destroy(string $id)
    {
        // Find the profile by ID
        $profile = Profile::find($id);
    
        // Check if profile exists
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found');
        }
    
        // Find the user associated with this profile
        $user = User::find($profile->user_id);
    
        // Check if user exists
        if ($user) {
            // Optional: Delete the profile if you want to delete the related profile as well
            // $profile->delete();
    
            // Delete the user
            $user->delete();
    
            // Redirect with success message
            return redirect('/user_profiles')->with('success', 'Profile deleted successfully');
        } else {
            // Handle case where user is not found
            return redirect()->back()->with('error', 'User associated with the profile not found');
        }
    }


    public function importUserProfilesExcel(Request $request)
    {
        try {
            Excel::import(new ImportUserProfiles, $request->file);
            $request->session()->flash('success', 'Excel imported successfully!');
            return redirect()->route('user_profiles.index');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    

}