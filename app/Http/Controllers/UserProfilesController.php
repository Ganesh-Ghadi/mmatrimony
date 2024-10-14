<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfilesController extends Controller
{
    public function basic_details(){
        $user = auth()->user()->profile()->first();
        return view('basic_details.index', ['user'=>$user]);
    } 
}