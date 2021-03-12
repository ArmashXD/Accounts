<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('details');
            $table->date('purchase_date',36);
            $table->float('invoice_number',36);
            $table->unsignedBigInteger('supplier_id');
            $table->float('quantity',36);
            $table->float('rate',36);
            $table->float('total',36);
            $table->longText('item_information');
            $table->timestamps();
        });
        Schema::table('purchases', function (Blueprint $table) {
            $table->foreign('supplier_id')->references('id')->on('suppliers')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
