<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('marka')->nullable();
            $table->string('model')->nullable();
            $table->string('title')->nullable();
            $table->integer('price')->nullable();
            $table->string('condition')->nullable();
            $table->string('city')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->text('note')->nullable();
            $table->integer('pin')->nullable();
            $table->integer('number')->nullable();
            $table->integer('published')->default(0);
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
        Schema::dropIfExists('sales');
    }
}
