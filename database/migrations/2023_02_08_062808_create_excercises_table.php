<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excercises', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->string('year');
            $table->string('week');
            $table->string('day');
            $table->string('name');
            $table->string('type_of_excercise',50);
            $table->string('repeats')->nullable();
            $table->time('time')->nullable();
            $table->string('goal',50);
            $table->tinyInteger('Sedentry')->default(0);
            $table->tinyInteger('Extra_Active')->default(0);
            $table->tinyInteger('Very_Active')->default(0);
            $table->tinyInteger('Moderately_Active')->default(0);
            $table->tinyInteger('Lightly_Active')->default(0);
            $table->string('image');
            $table->string('video');
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
        Schema::dropIfExists('excercises');
    }
}
