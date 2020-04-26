<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipesStepsIngredients extends Model
{
    //
    protected $fillable = [
       'recipes_id',
       'recipes_steps_id',
       'amount',
       'unit',
       'ingredients_id',

    ];

    // protected $appends = array('name');

    // public function getNameAttribute($value)
    // {
    //     $name = null;
    //     if($this->ingrename){
    //         $name = $this->ingrename->name;
    //     }
    //     return $name;
    // }

    public function toArray()
    {
        $ingredients = parent::toArray();

        if ($this->ingrename) {
            $ingredients['name'] = $this->ingrename->name;
        } else {
            $ingredients['name'] = null;
        }
        return $ingredients;
    }


    public function recipes()
    {
        return $this->belongsTo('App\Recipe');
    }

    public function ingrename()
    {
        return $this->belongsTo('App\Ingredients', 'ingredients_id');
    }



}
