<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tournament extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function team()
    {
        return $this->hasMany('App\Models\team');
    }
}
