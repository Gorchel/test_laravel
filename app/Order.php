<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';

    public function state()
    {
        return $this->hasOne('App\State','order_state');
    }

    public function goods()
    {
        return $this->hasMany('App\Good','order_good');
    }
}
