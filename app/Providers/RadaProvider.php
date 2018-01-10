<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class RadaProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('rada',function($attr, $val,$params,$validator){
            $success = stripos($val,'rada'.$params[0]) !== FALSE;
            if(!$success) {
                $validator->errors()->add($attr, 'Something is wrong with this field!');
            }
            return $success;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
