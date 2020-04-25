<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Categories;
use App\DishType;
use App\Ingredients;
use App\RecipesSteps;
use App\RecipesStepsIngredients;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::orderBy('title', 'ASC')->get();
        return view('admin.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ingredients = Ingredients::orderBy('name', 'ASC')->get();
        $types = DishType::pluck('name', 'id')->all();
        $categories = Categories::pluck('name', 'id')->all();
        return view('admin.recipes.create', compact('types', 'categories', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        // $recipe = new Recipe;
        // $recipe->title = $request->title;
        // $recipe->readyInMinutes = $request->readyInMinutes;
        // $recipe->dish_types_id = $request->dish_types_id;
        // $recipe->totalCosts = $request->totalCosts;
        
        $recipe_id = Recipe::create([
            'title' => $request->title,
            'readyInMinutes' => $request->readyInMinutes,
            'imageURL' => $request->title,
            'dish_types_id' => $request->dish_types_id,
            'categories_id' => $request->categories_id,
            'totalCosts' => $request->totalCosts,
        ]);

        $recipe_steps_id = RecipesSteps::create([
            'recipes_id' => $recipe_id->id,
            'instructions' => $request->instructions,
        ]);



        
        $ingredients;
        for($i=1; $i<= count($data['ingredients']); $i++){
            if(empty($data['ingredients'][$i]) || !is_numeric($data['ingredients'][$i])) continue;

            $ingredients = [
                'recipes_id' => $recipe_id->id,
                'recipes_steps_id' => $recipe_steps_id->id,
                'ingredients_id' => $data['ingredients'][$i],
                'amount' => $data['amount'][$i],
                'unit' => $data['unit'][$i],
            ];
            RecipesStepsIngredients::create($ingredients);
        }
        return redirect('admin/recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
