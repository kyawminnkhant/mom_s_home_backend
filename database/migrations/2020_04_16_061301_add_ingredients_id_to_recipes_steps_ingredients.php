<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIngredientsIdToRecipesStepsIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipes_steps_ingredients', function (Blueprint $table) {
            //
            $table->unsignedInteger('ingredients_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipes_steps_ingredients', function (Blueprint $table) {
            //
        });
    }
}
