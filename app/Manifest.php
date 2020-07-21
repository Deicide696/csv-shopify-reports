<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manifest extends Model
{
    //
    protected $fillable = ['manifest_id', 'income', 'cost', 'car_id', 'driver_id', 'customer_id', 'route_id', 'created_at', 'updated_at'];
}
