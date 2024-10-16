<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfilesController extends Controller
{
    public function basic_details()
    {
        $user = auth()->user()->profile()->first();
        return view('default.view.profile.basic_details.index', ['user' => $user]);
    }

    public function religious_details()
    {
        $user = auth()->user()->profile()->first();
        return view('default.view.profile.religious_details.create', ['user' => $user]);
    }

    public function family_details()
    {
        $user = auth()->user()->profile()->first();
        return view('default.view.profile.family_details.index', ['user' => $user]);
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
}