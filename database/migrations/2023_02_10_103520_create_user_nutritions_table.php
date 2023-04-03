<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNutritionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_nutritions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nutrition_id');
            $table->bigInteger('user_id');
            $table->string('goal');
            $table->string('recipee_type');
            $table->string('month');
            $table->string('year');
            $table->bigInteger('serving')->default(0);
            $table->bigInteger('limit')->default(0);
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
        Schema::dropIfExists('user_nutritions');
    }
}
