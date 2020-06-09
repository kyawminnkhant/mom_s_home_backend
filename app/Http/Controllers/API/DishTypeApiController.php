<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DishType;
use Illuminate\Support\Facades\DB;

class DishTypeApiController extends Controller
{
    //
    public function getAllTypes()
    {
        $types = DishType::orderBy('name', 'ASC')->get();
        return \Response::json($types);
    }

}
