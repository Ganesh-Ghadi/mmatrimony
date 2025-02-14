<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // public function index()
    // {
    //     $profiles = Profile::all();
    //     $users = User::all();

    //     return view('admin.dashboard', ['profiles' => $profiles, 'users' => $users]);
    // }
    public function index()
{
    $totalUsers = User::count();
    $activeUsers = User::where('active', 1)->count();
    $inactiveUsers = User::where('active', 0)->count();

    $birthdayUsers = Profile::whereMonth('date_of_birth', now()->month)->get();

    // Count Bride and Groom
    $brideCount = Profile::where('role', 'bride')->count();
    $groomCount = Profile::where('role', 'groom')->count();

    return view('admin.dashboard', compact(
        'totalUsers', 
        'activeUsers', 
        'inactiveUsers', 
        'birthdayUsers', 
        'brideCount', 
        'groomCount'
    ));
}

}