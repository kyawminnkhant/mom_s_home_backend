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
    public function index()
    {
        $recipes = Recipe::orderBy('updated_at', 'DESC')->get();
        // return new RecipeResource($recipes);
        return \Response::json($recipes);
    }
}
