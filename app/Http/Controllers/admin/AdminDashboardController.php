<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\ProfilePackage;
use App\Http\Controllers\Controller;

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
    
        $allBirthdayUsers = Profile::whereMonth('date_of_birth', now()->month)->get();
    
        $birthdayUsers = $allBirthdayUsers->take(5); // Show only 5 on dashboard
        $hasMoreBirthdays = $allBirthdayUsers->count() > 5; // Check if more than 5 exist
    
        $brideCount = Profile::where('role', 'bride')->count();
        $groomCount = Profile::where('role', 'groom')->count();
    
        $expiringPackages = ProfilePackage::whereBetween('expires_at', [now(), now()->addDays(7)])->get();
    
        return view('admin.dashboard', compact(
            'totalUsers', 
            'activeUsers', 
            'inactiveUsers', 
            'birthdayUsers', 
            'hasMoreBirthdays', 
            'brideCount', 
            'groomCount',
            'expiringPackages'
        ));
    }

    public function showExpiringPackages()
    {
        $expiringPackages = ProfilePackage::whereMonth('expires_at', now()->month)->get();
    
        return view('admin.expiring-packages', compact('expiringPackages'));
    }

    public function showBirthdays()
{
    $birthdayUsers = Profile::whereMonth('date_of_birth', now()->month)->get();
    return view('admin.birthdays', compact('birthdayUsers'));
}
}