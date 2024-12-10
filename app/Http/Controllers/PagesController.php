<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\SubCaste;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function view($pageId = 50)
    {
        dd($pageId);
    }
}