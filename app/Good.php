<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $primaryKey = 'good_id';

    public function advert()
    {
        return $this->belongsTo('App\Advert','good_advert');
    }

    public function order()
    {
        return $this->belongsTo('App\Order','order_good');
    }
}
