<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        $users = User::all();

        return view('admin.dashboard', ['profiles' => $profiles, 'users' => $users]);
    }
}
