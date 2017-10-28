<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $with = ['user', 'like'];
    
    protected $fillable = ['content','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function like()
    {
        return $this->hasMany('App\Like');
    }
}

