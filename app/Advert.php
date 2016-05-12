<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Advert extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_first_name', 'user_last_name', 'user_password', 'user_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_password', 'remember_token',
    ];

    protected $primaryKey = 'user_id';

    public function getAuthPassword() {
        return $this->user_password;
    }

    public function goods()
    {
        return $this->hasMany('App\Good', 'good_advert');
    }
}
