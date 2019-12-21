<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alerted extends Model
{
    protected $fillable = [
        'alert_id',
        'alert_key',
        'user_id',
        'seen',
    ];
}
