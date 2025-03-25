<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    //Table Name
    protected $table = 'order_items';

    //primary key
    public $primaryKey = 'id';

    //TImestamps
    public $timestamps = true;

    public function product()
    {
        return $this->hasOne('App\Products', 'id', 'product_id');
    }
}
