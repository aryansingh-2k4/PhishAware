<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'campaign_name',
        'target_email',
        'email_subject',
        'email_body',
        'redirect_url',
        'tracking_token',
        'status',
    ];
}
