<?php

namespace App\Http\Controllers\admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProfilesController extends Controller
{
    public function index()
    {
        $profiles = Profile::paginate(12);
        return view('admin.user_profiles.index', ['profiles' =>$profiles]);
    }

    public function edit(string $id)
    {
        $profile = Profile::find($id);
        return view('admin.user_profiles.edit', ['profile' =>$profile]);
    }

    public function user_profiles()
    {
        $user = auth()->user()->profile()->first();
        return view('admin.user_profiles.create', ['user' =>$user]);
    }
}
