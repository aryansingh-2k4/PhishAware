<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\PhishingLog;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCampaigns = Campaign::count();

        $sentCampaigns = Campaign::where('status', 'Sent')->count();

        $totalCredentials = PhishingLog::count();

        return view('dashboard', compact(
            'totalCampaigns',
            'sentCampaigns',
            'totalCredentials'
        ));
    }
}
