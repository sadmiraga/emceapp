<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;

    public function tournament()
    {

        return $this->belongsTo('App\Models\tournament');
    }
}
