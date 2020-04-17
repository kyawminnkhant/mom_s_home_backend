<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    protected $fillable = [
        'title',
        'readyInMinutes',
        'imageURL',
        'categories_id',
        'dish_types_id',
        'totalCosts',

    ];


    public function type()
    {
        return $this->belongsTo('App\DishType', 'dish_types_id');
    }

    public function categories() {
        return $this->belongsTo('App\Categories');
    }

}
