<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->string('name' , 40);
            $table->bigInteger('amount_liter')->nullable();
            $table->bigInteger('amount_milliliter')->nullable();
            $table->integer('unit_id')->unsigned()->nullable();
            $table->float('total_quantities_liter' , 20 ,3)->nullable();
            $table->float('total_quantities_milliliter' , 20 ,3)->nullable();
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
