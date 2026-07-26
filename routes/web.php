<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\SimulationController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('campaigns', CampaignController::class);

Route::post('/campaigns/{campaign}/send', [CampaignController::class, 'send'])
    ->name('campaigns.send');

Route::get('/simulate/{token}', [SimulationController::class, 'showLoginForm'])
    ->name('simulate.login');

Route::post('/simulate/{token}', [SimulationController::class, 'captureCredentials'])
    ->name('simulate.capture');
