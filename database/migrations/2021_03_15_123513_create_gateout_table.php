<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGateoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateout', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id');
            $table->float('total');
            $table->float('rate');
            $table->float('discount');
            $table->float('quantity');
            $table->date('date');
            $table->string('code');
            $table->longText('details');
            $table->float('customer_id');
            $table->float('product_id');
            $table->float('tax_id');
            $table->float('unit_id');
            $table->timestamps();
        });
        Schema::table('gateout', function(Blueprint $table){
            $table->foreign('sale_id')->references('id')->on('sales')->cascadeOnUpdate()->cascadeOnDelete();
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gateout');
    }
}
