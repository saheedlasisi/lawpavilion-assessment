<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //Table Name
    protected $table = 'customers';

    //primary key
    public $primaryKey = 'id';

    //TImestamps
    public $timestamps = true;
}
