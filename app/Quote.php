<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'yname',
        'yemail',
        'c_name',
        'c_email',
        'phone',
        'website',
        'interest',
        'time_frame',
        'message',
        'ticket',
    ];


}
