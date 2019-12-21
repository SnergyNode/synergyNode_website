<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class Alert extends Model
{
    protected $fillable = [
        'table',
        'table_id',
        'key',
        'type',
    ];

    function keygen($timestamp, $hostname, $processId, $id)
    {
        // Building binary data.
        $bin = sprintf(
            "%s%s%s%s",
            pack('N', $timestamp),
            substr(md5($hostname), 0, 3),
            pack('n', $processId),
            substr(pack('N', $id), 1, 3)
        );
        // Convert binary to hex.
        $result = '';
        for ($i = 0; $i < 12; $i++) {
            $result .= sprintf("%02x", ord($bin[$i]));
        }
        return $result;
    }

    public function setKeyAttributes($value){
        return $this->attributes['key'] = $this->keygen(time(), php_uname($value), getmypid(), count(Alert::all()));
    }

    public function notseen($id){
        $exist = Alerted::where('user_id', Auth::user()->id)
            ->where('alert_id', '=', $id)
            ->where('alert_key', '=', $this->key)
            ->where('seen', '=', true)->get();

        return count($exist)>0?false:true;
    }

    public function setMessage($table){
        return 'New Quote from '. $this->getInfo('yname', $table, $this->table_id) ;
    }

    public function setRoute(){
        // todo: use a switch statement to assign route
        // todo: [use table n type for switch]
        return route('view.route', $this->key);
    }

    public function getInfo($key, $table, $id){
        $info = DB::select("select * from  $table  where id = $id");
        $name = explode(' ', $info[0]->$key);
        return $name[0];
    }

}
