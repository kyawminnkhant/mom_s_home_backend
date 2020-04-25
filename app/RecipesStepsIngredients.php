<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipesStepsIngredients extends Model
{
    //
    protected $fillable = [
       'recipes_id',
       'recipes_steps_id',
       'amount',
       'unit',
       'ingredients_id',

    ];

}
