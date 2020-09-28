<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function Posts()
    {
       return $this->belongsTo('App\models\User');
    }
 
    public function likes()
    {
       return $this->hasMany('App\models\like');
    }
    public function comments()
    {
       return $this->hasMany('App\models\Comment');
    }
 
}
