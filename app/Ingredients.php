<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    //
    protected $fillable = [
        'name',
        'ingredients_types_id'

    ];
 
    public function ingretype()
    {
        return $this->belongsTo('App\IngredientsTypes', 'ingredients_types_id');
    }

}
