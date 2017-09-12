<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Charge_payment;

class CreateChargePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('charge_id');
            $table->integer('payment_id');
            $table->decimal('amount',10,2);
            $table->timestamps();
        });

        Charge_payment::create([
            'charge_id' => 1,
            'payment_id' => 1,
            'amount' => 400.00
        ]);  
        Charge_payment::create([
            'charge_id' => 1,
            'payment_id' => 2,
            'amount' => 100.00
        ]); 
        Charge_payment::create([
            'charge_id' => 2,
            'payment_id' => 2,
            'amount' => 900.00
        ]);  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charge_payment');
    }
}
