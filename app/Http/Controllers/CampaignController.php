<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\PhishingSimulationMail;
use Illuminate\Support\Facades\Mail;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::latest()->get();
        return view('campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'campaign_name' => 'required',
            'target_email' => 'required|email',
            'email_subject' => 'required',
            'email_body' => 'required',
            'redirect_url' => 'required|url',
        ]);

        Campaign::create([
            'campaign_name' => $request->campaign_name,
            'target_email' => $request->target_email,
            'email_subject' => $request->email_subject,
            'email_body' => $request->email_body,
            'redirect_url' => $request->redirect_url,
            'tracking_token' => Str::random(40),
            'status' => 'Draft',
        ]);

        return redirect()->route('campaigns.index')
            ->with('success', 'Campaign created successfully.');
    }

    public function show(Campaign $campaign)
    {
        return view('campaigns.show', compact('campaign'));
    }

    public function edit(Campaign $campaign)
    {
        return view('campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'campaign_name' => 'required',
            'target_email' => 'required|email',
            'email_subject' => 'required',
            'email_body' => 'required',
            'redirect_url' => 'required|url',
        ]);

        $campaign->update([
            'campaign_name' => $request->campaign_name,
            'target_email' => $request->target_email,
            'email_subject' => $request->email_subject,
            'email_body' => $request->email_body,
            'redirect_url' => $request->redirect_url,
        ]);

        return redirect()->route('campaigns.index')
            ->with('success', 'Campaign updated successfully.');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return redirect()->route('campaigns.index')
            ->with('success', 'Campaign deleted successfully.');
    }
    public function send(Campaign $campaign)
{
    Mail::to($campaign->target_email)
        ->send(new PhishingSimulationMail($campaign));

    $campaign->status = 'Sent';
    $campaign->save();

    return redirect()->route('campaigns.index')
        ->with('success', 'Simulation email sent successfully.');
}
}
