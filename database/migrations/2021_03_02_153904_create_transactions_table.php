<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('ac_type');
            $table->unsignedBigInteger('bank_id');
            $table->string('dep_id');
            $table->float('amount');
            $table->longText('description');
            $table->timestamps();
        });
        Schema::table('transactions', function(Blueprint $table){
            $table->foreign('bank_id')->references('id')->on('banks')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
