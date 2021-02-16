<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('guid');
            $table->string('name');
            $table->float('amount',36);
            $table->date('date')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
        });
        Schema::create('liabilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('guid');
            $table->string('name');
            $table->float('amount',36);
            $table->date('date')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
        });
        Schema::create('equity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('guid');
            $table->string('name');
            $table->float('amount',36);
            $table->date('date')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
        });
        Schema::create('income', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('guid');
            $table->string('name');
            $table->float('amount',36);
            $table->date('date')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
        });
        Schema::create('expense', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('guid');
            $table->string('name');
            $table->float('amount',36);
            $table->date('date')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
        });
        Schema::table('assets', function (Blueprint $table){
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
        Schema::table('liabilities', function (Blueprint $table){
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
        Schema::table('equity', function (Blueprint $table){
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
        Schema::table('income', function (Blueprint $table){
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
        Schema::table('expense', function (Blueprint $table){
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
