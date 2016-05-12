<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';

    public function state()
    {
        return $this->belongsTo('App\State','order_state');
    }

    public function good()
    {
        return $this->belongsTo('App\Good','order_good');
    }
}
