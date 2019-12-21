<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Servic extends Model
{
    protected $fillable = [
        'unid', 'icon', 'title', 'intro', 'detail', 'status','live_url',
    ];

    public function intro(){
        return Str::words( $this->intro , 15, '  . . . ');
    }


    public function setUnidAttribute($value){
        return $this->attributes['unid'] = $this->unid();
    }

    public function setStatusAttribute($value){
        return $this->attributes['status'] = true;
    }
}
