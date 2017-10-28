<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = ['user_id', 'featured_img','name','summary'];

    public function getFeatured_imgAttribute($featured_img)
    {
        return asset($featured_img);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pages()
    {
        return $this->hasMany('App\Page');
    }

    public function genres(){
        return $this->belongsToMany('App\Genre');
    }

    
}
