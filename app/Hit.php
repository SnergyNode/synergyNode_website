<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Hit extends Model
{
    protected $fillable = [
        'ip', 'device', 'region', 'city', 'country','url', 'time', 'hit',
    ];

    public function timeago(){
        return Carbon::createFromTimeStamp($this->time)->diffForHumans();
    }
}
