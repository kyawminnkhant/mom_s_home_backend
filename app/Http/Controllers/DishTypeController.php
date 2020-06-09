<?php

namespace App\Http\Controllers;

use App\DishType;
use Illuminate\Http\Request;

class DishTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dTypes = DishType::orderBy('name', 'ASC')->get();
        return view('admin.types.index', compact('dTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.types.create');
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
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($file = $request->file('image')){
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path()."/images/", $profileImage);
            $path = '/images/'.$profileImage;
        }

        DishType::create([
            'name' => $request->name,
            'imageUrl' => $path,
        ]);

        // return $path;

        // DishType::create($request->all());
        return redirect('/admin/types');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DishType  $dishType
     * @return \Illuminate\Http\Response
     */
    public function show(DishType $dishType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DishType  $dishType
     * @return \Illuminate\Http\Response
     */
    public function edit(DishType $dishType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DishType  $dishType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DishType $dishType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DishType  $dishType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DishType $dishType)
    {
        //
        return 'its working';
    }
}
