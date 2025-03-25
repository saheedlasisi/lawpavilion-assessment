<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //Table Name
    protected $table = 'products';

    //primary key
    public $primaryKey = 'id';

    //TImestamps
    public $timestamps = true;
}
