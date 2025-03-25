<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsolidatedOrders extends Model
{
    //Table Name
    protected $table = 'consolidated_orders';

    //primary key
    public $primaryKey = 'id';

    //TImestamps
    public $timestamps = true;
}
