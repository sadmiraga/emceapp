<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//packages
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\drink;
use App\Models\stocktaking;

class inventoryController extends Controller
{
    //

    //display stocktaking INDEX
    public function index()
    {
        $drinks = drink::all();
        return view('bartender.activeInventory');
    }


    public function createStocktaking()
    {

        //check if user is logged in
        //$userID = Auth::id();
        if (!isset($userID)) {
            return view('stock.errorPage')->with('error', 'Da bi začel popis moras biti prijavljen');
        }

        $current_timestamp = Carbon::now()->timestamp;

        $stocktacking = new stocktaking();
        $stocktacking->user_id = Auth::id();
        $stocktacking->start  = $current_timestamp;
        $stocktacking->save();

        return redirect('/aktivni-popis');
    }
}
