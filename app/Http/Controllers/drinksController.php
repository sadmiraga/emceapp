<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//custom
use Illuminate\Support\Facades\DB;
use App\Models\drinkCategory;
use App\Models\drink;
use App\Models\menu;



class drinksController extends Controller
{

    //display all drinks
    public function index()
    {
        $drinks = drink::all();

        $drinks = DB::table('drinks')->join('drink_categories', function ($join) {
            $join->on('drink_categories.id', '=', 'drinks.category_id');
        })->select('*')->get();

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


        //ADD DRINK TO MENU
        $menu = new menu();
        $menu->drink_id = $drink->id;

        //get last position
        $categoryPositions = DB::table('menus')->join('drinks', function ($join) {
            $join->on('drinks.id', '=', 'menus.drink_id');
        })
            ->join('drink_categories', function ($join) {
                $join->on('drink_categories.id', '=', '.drinks.category_id');
            })->select('menus.category_position')
            ->where('drinks.category_id', '=', $drink->category_id)
            ->get();

        $json = json_decode($categoryPositions, true);
        $max_value = max($json);
        $lastPosition = $max_value['category_position'];

        $menu->category_position = $lastPosition + 1;
        $menu->save();


        return redirect('/pijace')->with('message', 'Uspesno ste dodali novo pijaco');
    }


    //display edit drink
    public function editDrink($drinkID)
    {
        $drink = drink::findOrFail($drinkID);
        $drinkCategories = drinkCategory::all();
        return view('admin.drinks.editDrink')->with('drink', $drink)->with('drinkCategories', $drinkCategories);
    }


    //execute edit drink
    public function editDrinkExe(Request $request)
    {
        $drink = drink::findOrFail($request->input('drinkID'));
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

        return redirect('/pijace')->with('message', 'Uspešno ste posodobili podatke o pijaci');
    }
}
