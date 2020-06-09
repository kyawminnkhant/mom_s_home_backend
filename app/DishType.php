<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class DishType extends Model
{
    //
    protected $fillable = [
        'name',
        'imageUrl'
    ];


    public function toArray()
    {
        $data = parent::toArray();

        $data['imageUrl'] = asset($data['imageUrl']);

        return $data;
    }



}
