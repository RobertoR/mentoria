<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            /*
             * increments - define un entero autoincrementable indexado como llave primaria
             * nullable() - define que al elemento es posible guardar valores nulos
             */
            $table->increments('id');
            $table->integer('product_type_id');
            $table->string('titulo');
            $table->longText('descripcion')->nullable();
            $table->decimal('price',10,2)->nullable();
            //Define el uso de los campos created_at & updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
