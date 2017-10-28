<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id','title_id','page_title','content','slug'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function title()
    {
        return $this->belongsTo('App\Title');
    }

    public function tags(){
       return $this->belongsToMany('App\Tag'); 
    }
}
