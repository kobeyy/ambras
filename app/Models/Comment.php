<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //If you would like to make all attributes mass assignable TODO why
    protected $guarded = [];


    public function post()
    {
        return $this->belongsTo('App\Post', 'on_post');
    }

}
