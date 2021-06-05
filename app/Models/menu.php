<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;


    //drink
    public function drink()
    {
        return $this->belongsTo('App\Models\drink');
    }
}
