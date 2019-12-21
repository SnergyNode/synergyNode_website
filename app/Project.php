<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable =[
        'type', 'start_date', 'due_date', 'cost', 'details', 'title', 'status', 'project_admin', 'priority', 'client_id'
    ];

    public function daysleft(){
        return $this->getdate($this->due_date);
    }

    public function teamlead(){
        //get team that is tied to the project
        $teamz = Team::where('project_id', $this->id)->where('team_lead', true)->first();

        return !empty($teamz)?$teamz->user()->setName():'Not Assigned';
//        return $this->hasOne(Team::class);
    }

    public function getdate($val)
    {
        $seconds = $val - time();

        $days = floor($seconds / 86400);
        $seconds %= 86400;

        $hours = floor($seconds / 3600);
        $seconds %= 3600;

        $minutes = floor($seconds / 60);
        $seconds %= 60;

        $msg1 = 'Day';
        $msg2 = 'Hr';
        if($days>1){$msg1='Days';}
        if($hours>1){$msg2='Hrs';}
        if($minutes>1){}
        if($seconds>1){}

        if($days <= 0){
            return "Date Due!";
        }
        return "$days $msg1 $hours $msg2";
    }

    public function progress(){
        //check if progress has task or not
        $task = $this->taskCount();
        if($task>1){
            //calculate number of task done less whats left

            $taskDone = count(Task::where('project_id', $this->id)->where('complete', true)->get());


            $percent = ($taskDone / $task);
            $percent = intval($percent * 100);

            return "<div class=\"progress-bar progress-bar-striped progress-bar-animated\" role=\"progressbar\" aria-valuenow=\"$percent\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: $percent%\">$percent%</div>";

        }else{
            return "<div class=\"progress-bar progress-bar-striped progress-bar-animated\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\">In Progress</div>";
        }
    }

    public function taskCount(){
        $task = Task::where('project_id', $this->id)->get();
        return count($task);

    }

    public function priority(){
        switch ($this->priority){
            case 1:
                return "Very Low";
                break;
            case 2:
                return "Low";
                break;
            case 3:
                return "Moderate";
                break;
            case 4:
                return "High";
                break;
            case 5:
                return "Very High";
                break;

        }
    }

    public function client($function = ''){
        //get the first client

        $client = Projectlist::where('project_id', $this->id)->first();
        if(empty($client)){
           return 'Unset';
        }
        if(!empty($function)){
            return $client->client()->$function();
        }else{
            return $client->client();
        }

    }

    public function clients(){
        return Projectlist::where('project_id', $this->id)->get();

    }
}
