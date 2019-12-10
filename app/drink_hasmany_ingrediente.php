<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class drink_hasmany_ingrediente extends Model
{
    public function drinks()
    {
        return $this->morphToMany('App\DrinksModel;', 'drinks');
    }

    public function ingrediente()
    {
        return $this->morphToMany('App\EstoqueModel;', 'drinks');
    }
}
