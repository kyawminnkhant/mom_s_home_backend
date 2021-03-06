<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Categories;
use App\DishType;
use App\Ingredients;
use App\RecipesSteps;
use App\RecipesStepsIngredients;
use App\SetMeal;
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
        $sets = SetMeal::pluck('name', 'id')->all();
        $types = DishType::pluck('name', 'id')->all();
        $categories = Categories::pluck('name', 'id')->all();
        return view('admin.recipes.create', compact('types', 'categories', 'ingredients', 'sets'));
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

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($file = $request->file('image')){
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path()."/images/", $profileImage);
            $path = '/images/'.$profileImage;
        }


        if($request->isSetMeals == 1) {
            $recipe_id = Recipe::create([
                'title' => $request->title,
                'readyInMinutes' => $request->readyInMinutes,
                'imageUrl' => $path,
                'dish_types_id' => $request->dish_types_id,
                'categories_id' => $request->categories_id,
                'totalCosts' => $request->totalCosts,
                'description' => $request->descriptions,
                'serving' => $request->serving,
                'is_set_meals' => $request->isSetMeals,
                'set_meals_id' => $request->set_meals_id,
            ]);
        } else {

        $recipe_id = Recipe::create([
            'title' => $request->title,
            'readyInMinutes' => $request->readyInMinutes,
            'imageUrl' => $path,
            'dish_types_id' => $request->dish_types_id,
            'categories_id' => $request->categories_id,
            'totalCosts' => $request->totalCosts,
            'description' => $request->descriptions,
            'serving' => $request->serving,
            'is_set_meals' => $request->isSetMeals,
            'set_meals_id' => null,
        ]);
        }

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
        $recipes = Recipe::findOrfail($recipe->id);
        $types = DishType::pluck('name', 'id')->all();
        $recipes_steps = RecipesSteps::where('recipes_id', $recipe->id)->first();
        $categories = Categories::pluck('name', 'id')->all();
        $ingredients = Ingredients::orderBy('name', 'ASC')->get();
        $recipes_ingredients = RecipesStepsIngredients::where('recipes_id', $recipe->id)->get();
        return view('admin.recipes.edit', compact('recipes','types', 'categories', 'ingredients', 'recipes_steps', 'recipes_ingredients'));
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
        $recipes_steps = RecipesStepsIngredients::where('recipes_id', $recipe->id)->get();
        foreach($recipes_steps as $recipes_step){
            RecipesStepsIngredients::where('id', $recipes_step->id)->delete();
        }
        // dd($recipes_steps);
        RecipesSteps::where('recipes_id', $recipe->id)->delete();
        Recipe::find($recipe->id)->delete();

        return redirect('admin/recipes');
        return 'success';
        // dd($recipe);
        // return 'this route';

    }
}
