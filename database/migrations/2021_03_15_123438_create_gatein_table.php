<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGateinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gatein', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id');
            $table->string('name');
            $table->string('details');
            $table->date('date',36);
            $table->float('invoice_number',36);
            $table->float('supplier_id');
            $table->float('quantity',36);
            $table->float('rate',36);
            $table->float('total',36);
            $table->longText('item_information');
            $table->timestamps();
        });
        Schema::table('gatein', function (Blueprint $table) {
            $table->foreign('purchase_id')->references('id')->on('purchases')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gatein');
    }
}
