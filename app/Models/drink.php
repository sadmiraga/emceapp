<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class drink extends Model
{
    use HasFactory;

    //DRINK CATEGORY
    public function drinkCategory()
    {
        return $this->belongsTo('App\Models\drinkCategory');
    }
}
