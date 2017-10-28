<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag'];
    
    public function pages(){
        return $this->belongsToMany('App\Page');
    }
}
