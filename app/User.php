<?php

namespace App;

use Storage;
use Avatar;
use App\Traits\Friendable;
use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Friendable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','username','slug','avatar',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function titles()
    {
        return $this->hasMany('App\Title');
    }

    public function pages()
    {
        return $this->hasMany('App\Page');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function getAvatarAttribute($avatars_img)
    {
        return asset($avatars_img);
    }

}

//create a hasMany for titles and pages //
