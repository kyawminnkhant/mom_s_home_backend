<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecipesStepsIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('recipes_steps_ingredients', function (Blueprint $table) {
            $table->id();
            $table->integer('recipes_id')->unsigned();
            $table->integer('recipes_steps_id')->unsigned();
            $table->unsignedSmallInteger('amount');
            $table->integer('ingredients_id')->unsigned();
            $table->string('unit');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('recipes_steps_ingredients');
    }
}
