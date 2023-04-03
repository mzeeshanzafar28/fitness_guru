<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserExcercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_excercises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('excercise_id');
            $table->bigInteger('user_id');
            $table->string('month');
            $table->string('year');
            $table->string('week');
            $table->string('day');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('user_excercises');
    }
}
