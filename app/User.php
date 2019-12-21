<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'who', 'unid', 'first_name', 'last_name', 'email', 'phone', 'passport',
        'username', 'address', 'office', 'active', 'password', 'role_id', 'seen_last','countdown_pass',
        'reset_toke',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setName(){
        return $this->title . ' ' . ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function setPhoto(){
        return url(is_file($this->passport)? url($this->passport) : 'images/synergy.png');
    }

    public function setUnidAttribute($value){
        return $this->attributes['unid'] = $this->unid();
    }

    public function setPasswordAttribute($value){
        return $this->attributes['password'] = bcrypt($value);
    }

    public function seen(){
        if(!empty($this->seen_last)){
            return Carbon::createFromTimeStamp($this->seen_last)->diffForHumans();
        }else{
            return 'not available';
        }

    }

    public function alerts(){
        //alert builder
        /**
         *
         */
        $alerts = Alert::all();
        //filter
        $data = array();
        foreach ($alerts as $alert){
            if($alert->notseen($this->id)){
                // build object instance
                array_push($data, $alert);
            }
        }
        return $data;
    }

    public function makeToken($val){
        $token = "";
        $codes = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codes .= "abcdefghijklmnopqrstuvwxyz";
        $codes .= "0123456789";
        $max = strlen($codes);
        for($i=0; $i < $val; $i++){
            $token.= $codes[random_int(0, $max-1)];
        }
        return $token;
    }


}
