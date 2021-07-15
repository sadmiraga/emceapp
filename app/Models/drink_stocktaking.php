<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class drink_stocktaking extends Model
{
    //DRINK
    public function drink()
    {
        return $this->hasMany('App\Models\drink');
    }

    //STOCKTAKING
    public function stocktaking()
    {
        return $this->hasMany('App\Models\stocktaking');
    }
}
