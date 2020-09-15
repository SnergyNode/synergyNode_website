<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'project_id',
        'user_id',
        'client_id',
        'type',
        'notes',
        'title',
    ];

    public function author(){
        $author = null;
        if(!empty($this->user_id)){
            $author = User::where('id', $this->user_id)->first();
        }else{
            $author = Client::where('id', $this->client_id)->first();

        }

        return $author;
    }
}
