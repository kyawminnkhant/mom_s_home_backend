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

    // protected $appends = array('categories');

    // public function getCategoriesAttribute($value)
    // {
    //     $categories = null;
    //     if($this->type){
    //         $categories = $this->type->name;
    //     }
    //     return $categories;
    // }

    public function toArray()
    {
        $data = parent::toArray();

        if ($this->type) {
            $data['dish_type'] = $this->type->name;
            $data['categories'] = $this->categories->name;
        } else {
            $data['dish_type'] = null;
            $data['categories'] = null;
        }

        if ($this->recipessteps) {
            $data['instructions'] = $this->recipessteps->instructions;
        } else {
            $data['instructions'] = null;
        }

        if($this->ingredients) {
            $data['ingredients'] = $this->ingredients;
        } else {
            $data['ingredients'] = null;
        }

        return $data;
    }


    public function type()
    {
        return $this->belongsTo('App\DishType', 'dish_types_id');
    }

    public function categories() {
        return $this->belongsTo('App\Categories');
    }

    public function recipessteps()
    {
        return $this->belongsTo('App\RecipesSteps', 'id', 'recipes_id');
    }

    public function ingredients()
    {
        return $this->hasMany('App\RecipesStepsIngredients', 'recipes_id');
    }

    

}
