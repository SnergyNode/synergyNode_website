<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Synergy extends Model
{
    protected $fillable = [
        'facebook',
        'linkd',
        'twitter',
        'instagram',
        'google',
        'youtube',
        'tel1',
        'tel2',
        'mail1',
        'mail2',
        'about',
        'about_acr',
        'service',
        'service_acr',
        'work',
        'work_acr',
        'client',
        'client_acr',
        'contact',
        'contact_acr',
        'adrs'
    ];


}
