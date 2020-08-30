<?php

namespace App\Http\Controllers;

use App\SetMeal;
use App\Recipe;
use Illuminate\Http\Request;

class SetMealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = SetMeal::all();
        return view('admin.setmeals.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $recipes = Recipe::orderBy('updated_at', 'DESC')->get();
        return view('admin.setmeals.create', compact('recipes'));
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

        SetMeal::create([
            'name' => $request->name,
        ]);
        return redirect('admin/setmeals');
        // for($i = 1; $i <= count($data['recipes']); $i++)
        // {
        //     // if(empty($data['recipes'][$i]) || is_numeric($data['recipes'][$i])) continue;

        //     $recipes = [
        //         'name' => $data['name'],
        //         'recipes_id' => $data['recipes'][$i],
        //     ];

        //     // SetMeal::create($)

        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SetMeal  $setMeal
     * @return \Illuminate\Http\Response
     */
    public function show(SetMeal $setMeal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SetMeal  $setMeal
     * @return \Illuminate\Http\Response
     */
    public function edit(SetMeal $setMeal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SetMeal  $setMeal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SetMeal $setMeal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SetMeal  $setMeal
     * @return \Illuminate\Http\Response
     */
    public function destroy(SetMeal $setMeal)
    {
        //
    }
}
