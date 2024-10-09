<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProfilesController extends Controller
{
    public function basic_details()
    {
        $user = auth()->user()->profile()->first();
        return view('basic_details.create', ['user' =>$user]);
    }
}
