<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compareModel extends Model
{
    use HasFactory;

    public $id;
    public $name;
    public $value;
}
