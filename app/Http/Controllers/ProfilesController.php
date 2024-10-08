<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function basic_details()
    {
        $user = auth()->user()->profile()->first();
        return view('basic_details.create', ['user' =>$user]);
    }
}
