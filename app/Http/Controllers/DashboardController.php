<?php

namespace App\Http\Controllers;

use App\Models\FreeScheme;
use Illuminate\Http\Request;
use App\Models\GrantApproval;
use App\Mail\TestNotification;
use App\Models\CustomerTracking;
use App\Models\FreeSchemeDetail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\RoiAccountabilityReport;
use App\Models\DoctorBusinessMonitoring;
use App\Mail\FreeSchemeApprovalNotification;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return view('dashboard');
    }

    public function test()
    {

    
            // Mail::to('ganeshghadi084@gmail.com')
            // //    ->bcc($print[0]->FreeScheme->Manager->ZonalManager->communication_email)
            //    ->send(new FreeSchemeApprovalNotification($print));








        // Mail::to("ghadiganesh2002@gmail.com")
        //     ->send(new TestNotification());
        //     Log::info('test');
    
    }

}