<?php

namespace App\Http\Controllers;

use App\Ingredients;
use App\IngredientsTypes;
use Illuminate\Http\Request;

class IngredientsController extends Controller 
{

    public function index()
    {
        # code...
        $ingredients = Ingredients::orderBy('name', 'ASC')->get();
        return view('admin.ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        # code...
        $types = IngredientsTypes::pluck('name', 'id')->all();
        return view('admin.ingredients.create', compact('types'));
    }

    public function store(Request $request)
    {
        //
        Ingredients::create($request->all());
        return redirect('/admin/ingredients');
    }


}


