<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('spare_parts')->nullable();
            $table->string('marka')->nullable();
            $table->string('model')->nullable();
            $table->string('year')->nullable();
            $table->string('motor')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('condition')->nullable();
            $table->string('texpassport')->nullable();
            $table->string('city')->nullable();
            $table->string('image')->nullable();
            $table->integer('pin')->nullable();
            $table->string('answer')->nullable();
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
        Schema::dropIfExists('announcements');
    }
}
