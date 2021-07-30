<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\drink;
use App\Models\drinkCategory;
use App\Models\menu;

class menuController extends Controller
{

    public function publicIndex()
    {
        $drinks = drink::all();
        $drinkCategories = drinkCategory::all();

        return view('guest.publicMenu')->with('drinks', $drinks)->with('drinkCategories', $drinkCategories)->with('selectedCategoryID', null);
    }

    public function getMenuDrinks($drinkCategoryID)
    {

        $drinks = drink::where('category_id', $drinkCategoryID)->get();
        $drinkCategories = drinkCategory::all();
        return view('guest.publicMenu')->with('drinks', $drinks)->with('drinkCategories', $drinkCategories)->with('selectedCategoryID', $drinkCategoryID);
    }


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

    //display edit menu by category
    public function editMenu($categoryID)
    {

        //get category Name
        $category = DB::table('drink_categories')->select('categoryName')->where('id', '=', $categoryID)->get();
        $tempName = json_decode($category, true);
        $categoryName = $tempName[0]['categoryName'];

        $drinks = DB::table('menus')->join('drinks', function ($join) {
            $join->on('drinks.id', '=', 'menus.drink_id');
        })
            ->join('drink_categories', function ($join) {
                $join->on('drink_categories.id', '=', '.drinks.category_id');
            })->select('*')
            ->where('drinks.category_id', '=', $categoryID)
            ->orderBy('menus.category_position', 'asc')
            ->get();


        return view('admin.menu.editMenu')->with('categoryName', $categoryName)->with('drinks', $drinks);
    }


    //change position of drink on menu
    public function changePosition($direction, $drinkID, $categoryID)
    {


        //get selected menu item
        $selectedMenuItem = menu::where('drink_id', $drinkID)->first();

        //get max position
        $maxMenuPosition = menu::max('category_position');

        //check direction
        if ($direction == "up") {
            $secondaryPosition = $selectedMenuItem->category_position - 1;
        } else if ($direction == "down") {
            $secondaryPosition = $selectedMenuItem->category_position + 1;
        }

        //check if position is out of bounds
        if ($secondaryPosition < 1 || $secondaryPosition > $maxMenuPosition) {
            return redirect('uredi-meni/' . $categoryID)->with("error", "Ne morete tega izvesti");
        }

        //get menu item that has to be updated
        $secondaryMenuItem = menu::where('category_position', $secondaryPosition)->first();
        $secondaryMenuItem->category_position = $selectedMenuItem->category_position;
        $secondaryMenuItem->save();

        $selectedMenuItem->category_position = $secondaryPosition;
        $selectedMenuItem->save();


        return redirect('uredi-meni/' . $categoryID)->with("message", "Uspešno ste spremenili pozicijo pijace na meniju");
    }
}
