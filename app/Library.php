<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    public function titles()
    {
        return $this->hasMany('App\Title');
    }
}
