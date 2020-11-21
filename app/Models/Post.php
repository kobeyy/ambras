<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function comments()
    {
        return $this->hasMany('App\Comment', 'on_post');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

}
