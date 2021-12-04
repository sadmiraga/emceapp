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
        })->select('drink_categories.categoryName as categoryName', 'drinks.name as name', 'drinks.price as price', 'drinks.packing_weight as packing_weight', 'drinks.id as id')->orderBy('drinks.created_at', 'desc')->get();

        //return $drinks;

        //return $drinks;
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
        $drink->code = $request->input('drinkCode');
        $drink->enme = $request->input('enme');
        $drink->packing_size = $request->input('packingSize');

        if ($request->input('packingWeight') == null) {
            $drink->weightable = false;
            $drink->packing_weight = null;
        } else {
            $drink->weightable = true;
            $drink->packing_weight = $request->input('packingWeight');
        }

        $drink->save();


        /* add to menu position */
        if ($request->input('displayOnMenuCheckbox') != null) {

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


            //check if drink is first at a list
            if (count((array)$json) == 0) {
                $max_value = 0;
            } else {
                $max_value = max($json);
            }

            $lastPosition = $max_value['category_position'];

            $menu->category_position = $lastPosition + 1;
            $menu->save();
        }


        /* check if drink is available for menu display */
        if ($request->input('displayOnMenuCheckbox') != null) {
            $drink->display_on_menu = true;
        } else {
            $drink->display_on_menu = false;
        }

        $drink->save();


        return redirect('/pijace')->with('message', 'Uspesno ste dodali novo pijaco');
    }

    public function deleteDrink($drinkID)
    {
        $drink = drink::findOrFail($drinkID);
        $drink->delete();
        return redirect()->back()->with('successMessage', 'Uspesno ste izbrisali pijaco');
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
