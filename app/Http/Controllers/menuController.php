<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\drink;
use App\Models\drinkCategory;

class menuController extends Controller
{
    //display private menu
    public function privateIndex()
    {
        $drinks = DB::table('drinks')->join('menus', function ($join) {
            $join->on('menus.drink_id', '=', 'drinks.id');
        })->select('*')
            ->orderBy('category_position', 'asc')
            ->get();


        $drinkCategories = drinkCategory::all();

        return view('admin.menu.privateIndex')->with('drinks', $drinks)->with('drinkCategories', $drinkCategories);
    }
}
