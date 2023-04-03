<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutritionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrition', function (Blueprint $table) {
            $table->id();
            $table->string('month',50);
            $table->string('year',50);
            $table->string('goal',50);
            $table->string('recipe_type',50);
            $table->string('recipe_no',50);
            $table->string('title');
            $table->longText('about_recipee');
            $table->longText('ingredients');
            $table->string('serving');
            $table->bigInteger('net_carbs');
            $table->bigInteger('protien');
            $table->bigInteger('fat');
            $table->string('image');
            $table->tinyInteger('Sedentry')->default(0);
            $table->tinyInteger('Extra_Active')->default(0);
            $table->tinyInteger('Very_Active')->default(0);
            $table->tinyInteger('Moderately_Active')->default(0);
            $table->tinyInteger('Lightly_Active')->default(0);
            
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
        Schema::dropIfExists('nutrition');
    }
}
