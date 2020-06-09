<?php

namespace App\Http\Controllers;

use App\IngredientsTypes;
use Illuminate\Http\Request;

class IngredientsTypesController extends Controller 
{

    public function index()
    {
        # code...
        $ingredients = IngredientsTypes::orderBy('name', 'ASC')->get();
        return view('admin.ingredients_types.index', compact('ingredients'));
    }

    public function create()
    {
        # code...
        return view('admin.ingredients_types.create');
    }

    public function store(Request $request)
    {
        //
        IngredientsTypes::create($request->all());
        return redirect('/admin/ingretypes/');
    }


}


