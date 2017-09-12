<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Charge;

class Payment extends Model
{
    protected $fillable = ['payment'];

    public function charges(){
    	return $this->belongsToMany(Charge::class);
    }

    public function charge_detail(){
    	return $this->hasMany(Charge_payment::class);
    }
}
