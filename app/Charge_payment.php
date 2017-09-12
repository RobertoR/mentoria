<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge_payment extends Model
{
    protected $table = "charge_payment";

    protected $fillable = ['charge_id','payment_id','amount'];
}
