<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $users = Profile::take(4)->get();
        return view('default.view.pages.home_page.index', ['users' => $users]);
    }


    public function load_users(Request $request){
        $offset = $request->input('offset', 0);
        $users = auth()->user()->profile()->skip($offset)->take(4)->get();
        return view('default.view.pages.home_page.index', ['users' => $users]);
    }
    
}