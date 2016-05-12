<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $primaryKey = 'state_id';

    public function order()
    {
        return $this->belongsTo('App\Order','order_state');
    }
}
