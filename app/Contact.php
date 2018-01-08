<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
	use SoftDeletes	;

    protected $fillable = ['first_name','last_name'];


    public function phones(){
    	return $this->hasMany(Phone::class);
    }
}
