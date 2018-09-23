<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table='customerInfo';
    protected $fillable=['customerName','address','organization','email','mobile','image'];
    protected $primaryKey = 'cid';
}
