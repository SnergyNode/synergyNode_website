<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectlist extends Model
{
    protected $fillable =[
        'client_id', 'project_id', 'lead',
    ];

    public function client(){
        return Client::where('id', $this->client_id)->first();
    }

    public function project($id){
        return Project::findOrFail($id);
    }
}
