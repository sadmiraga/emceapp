<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stocktaking extends Model
{
    use HasFactory;

    public $timestamps = false;

    // drink_stocktaking
    public function drink_stocktaking()
    {
        return $this->belongsTo('App\Models\drink_stocktaking');
    }

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
