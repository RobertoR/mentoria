<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;
use App\Charge_payment;

class Charge extends Model
{
    protected $fillable = ['charge'];


    public function payments(){
    	return $this->belongsToMany(Payment::class);
    }

    public function payment_detail(){
    	return $this->hasMany(Charge_payment::class);
    }
}
