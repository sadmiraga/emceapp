<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class drink extends Model
{
    use HasFactory;

    //drink category
    public function drinkCategory()
    {
        return $this->belongsTo('App\Models\drinkCategory');
    }

    //MENU
    public function menu()
    {
        return $this->hasMany('App\Models\menu');
    }
}
