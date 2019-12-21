<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'slug', //
        'title', //
        'desc', //
        'detail',
        'category_id',//
        'tags',//
        'type',//
        'keywords',
        'banner', //
        'user_id', //
        'status', //
        'hits'

    ];

    public function status(){
        return $this->status?'Published':'Unpublished';
    }

    public function banner(){
        return url( is_file($this->banner)?$this->banner:'images/default.png');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
