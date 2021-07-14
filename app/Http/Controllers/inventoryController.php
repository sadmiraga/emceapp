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
        $started_bool = true;
        $drinks = drink::all();
        return view('bartender.activeInventory')->with('started_bool', $started_bool);
    }


    public function createStocktaking()
    {
        $current_timestamp = Carbon::now()->timestamp;

        $stocktacking = new stocktaking();
        $stocktacking->user_id = Auth::id();
        $stocktacking->start  = $current_timestamp;
        $stocktacking->save();

        return redirect('/aktivni-popis');
    }
}
