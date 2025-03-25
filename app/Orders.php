<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //Table Name
    protected $table = 'orders';

    //primary key
    public $primaryKey = 'id';

    //TImestamps
    public $timestamps = true;


    public function customer()
    {
        return $this->hasOne('App\Customers', 'id', 'customer_id');
    }

    public function item()
    {
        return $this->hasOne('App\OrderItems', 'order_id', 'id');
    }

    public function items()
    {
        return $this->hasMany('App\OrderItems', 'order_id', 'id');
    }



    //
}
