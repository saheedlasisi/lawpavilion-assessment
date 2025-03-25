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
}
