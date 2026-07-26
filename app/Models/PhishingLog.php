<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhishingLog extends Model
{
    protected $fillable = [
        'campaign_id',
        'username',
        'password',
        'ip_address',
        'user_agent'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
