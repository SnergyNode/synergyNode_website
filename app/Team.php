<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable =[
        'project_id','user_id','team_lead'
    ];

    public function user(){

        return User::where('id',$this->user_id)->first();
    }

    public function users(){
        return User::where('id',$this->user_id)->get();
    }

    public function project($id){
        return Project::findOrFail($id);
    }

}
