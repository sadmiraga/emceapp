<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userType extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->hasMany('App\Models\User');
    }
}
