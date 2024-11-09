<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Caste;
use App\Models\Profile;
use App\Models\SubCaste;
use Illuminate\Http\Request;

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

    public function user_profiles()
    {
        $user = auth()->user()->profile()->first();
        return view('admin.user_profiles.create', ['user' => $user]);
    }
}
