<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class drinkCategory extends Model
{
    use HasFactory;

    //DRINK
    public function drink()
    {
        return $this->hasMany('App\Models\drink');
    }
}
