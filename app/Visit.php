<?php

namespace App;

use Carbon\Carbon;
use DateTime;
use function GuzzleHttp\Psr7\str;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'ip', 'device', 'region', 'city', 'country','url', 'time', 'hit',
    ];

    public static function saveit($data){
         $ip = $data['ip'];
         $today = strtotime('today');
         $visits = Visit::where('ip','=', $ip)->where('time', '>=', $today)->first();

         if(!empty($visits)){
             $data['hit'] = intval($visits->hit) + 1;
             $visits->update($data);
             Hit::create($data);
         }else{
             $data['hit'] = 1;
             Visit::create($data);
             Hit::create($data);
         }
    }

    public function timeago(){
        return Carbon::createFromTimeStamp($this->time)->diffForHumans();
    }

    public function hits(){
        return Hit::orderBy('id', 'DESC')->where('ip', '=',$this->ip)->where('time','>=', strtotime('today'))->get();
    }

    public function today(){
        return Visit::where('time','>=', strtotime('today'))->get();
    }

    public function thismonth(){

        $thismonth = new DateTime('first day of this month');
        $thismonth = strtotime($thismonth->format('F Y'));
        return Visit::where('time','>=', $thismonth)->get();
    }

    public function thisweek(){
        $disweek = strtotime('last Monday');
        return Visit::where('time','>=', $disweek)->get();
    }

    public function thisyear(){
        $thisyear = strtotime('first day of January'.date('Y'));
        return Visit::where('time','>=', $thisyear)->get();
    }
}
