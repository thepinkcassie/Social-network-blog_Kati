<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id','avatars_img', 'location', 'about', 'website',];

    public function getFeatured_imgAttribute($avatars_img)
    {
        return asset($avatars_img);
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
