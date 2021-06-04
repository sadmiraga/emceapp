<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//custom
use App\Models\drinkCategory;
use App\Models\drink;



class drinksController extends Controller
{

    //display all drinks
    public function index()
    {
        $drinks = drink::paginate(1);
        return view('admin.drinks.drinksIndex')->with('drinks', $drinks);
    }


    //display new drink form
    public function newDrink()
    {
        $drinkCategories = drinkCategory::all();
        return view('admin.drinks.newDrink')->with('drinkCategories', $drinkCategories);
    }

    //execute adding drink
    public function newDrinkExe(Request $request)
    {

        $drink = new drink();
        $drink->name = $request->input('drinkName');
        $drink->price = $request->input('drinkPrice');
        $drink->category_id = $request->input('category_id');

        if ($request->input('packingWeight') == null) {
            $drink->weightable = false;
            $drink->packing_weight = null;
        } else {
            $drink->weightable = true;
            $drink->packing_weight = $request->input('packingWeight');
        }

        $drink->save();

        return redirect('/pijace')->with('message', 'Uspesno ste dodali novo pijaco');
    }
}
