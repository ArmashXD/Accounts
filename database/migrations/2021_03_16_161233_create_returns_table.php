<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('returns', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('sale_number');
                $table->unsignedBigInteger('sale_id');
                $table->unsignedBigInteger('product_id');
                $table->float('total', 36);
                $table->float('quantity', 36);
                $table->timestamps();
            });
            Schema::table('returns', function (Blueprint $table) {
                $table->foreign('sale_id')->references('id')->on('sales')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreign('product_id')->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('returns');
    }
}
