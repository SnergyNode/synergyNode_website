<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'passport', 'username', 'address', 'office',

    ];

    public function setName(){
        return  ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function setPhoto(){
        return url(is_file($this->passport)? url($this->passport) : 'images/synergy.png');
    }
}
