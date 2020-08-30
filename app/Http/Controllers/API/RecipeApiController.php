<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\RecipesSteps;
use App\RecipesStepsIngredients;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Recipe as RecipeResource;

class RecipeApiController extends Controller
{
    //
    public function lasted()
    {
        // $recipes = Recipe::orderBy('updated_at', 'DESC')->take(10)->get();
        // return new RecipeResource($recipes);

        /* ->map(function (variable) add laravel accessor for full image URL) */
        $recipes = DB::table('recipes')->orderBy('updated_at', 'DESC')->select('id', 'title', 'imageUrl')->paginate()->map(function ($recipes) {
            $recipes->imageUrl = asset($recipes->imageUrl);
            return $recipes;
        });
        return \Response::json($recipes);
        // return $recipes(imageUrl);
    }

    public function getRecipesByTypes($type)
    {
        // return $category;
        // $recipes = Recipe::where('dish_types_id', $type)->get();
        // $recipes = DB::table('recipes')->orderBy('updated_at', 'DESC');
        $recipes = DB::table('recipes')->orderBy('updated_at', 'DESC')->where('dish_types_id', $type)->select('id', 'title', 'imageUrl')->get()->map(function ($recipes) {
            $recipes->imageUrl = asset($recipes->imageUrl);
            return $recipes;
        });
        return \Response::json($recipes);
    }

    public function getRecipe($recipe_id)
    {
        $recipe = Recipe::where('id', $recipe_id)->get();
        return \Response::json($recipe);
    }

    public function getSetMealsRecipe($set_meals_id)
    {
        $recipes = DB::table('recipes')->orderBy('updated_at', 'DESC')->where('set_meals_id', $set_meals_id)->select('id', 'title', 'imageUrl')->get()->map(function ($recipes) {
            $recipes->imageUrl = asset($recipes->imageUrl);
            return $recipes;
        });
        return \Response::json($recipes);

    }

    /**
     *
     *
     * TODO: randomize the results from the database.
     *
     */

    public function randomFeeds()
    {
    $recipes = DB::table('recipes')->select('id', 'title', 'imageUrl')->inRandomOrder()->limit(10)->get()->map(function ($recipes) {
        $recipes->imageUrl = asset($recipes->imageUrl);
        return $recipes;
    });
    return \Response::json($recipes);

    }



}
