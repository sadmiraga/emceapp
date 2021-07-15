<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//packages
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//models
use App\Models\drink;
use App\Models\stocktaking;
use App\Models\drink_stocktaking;

class inventoryController extends Controller
{
    //

    //display stocktaking INDEX
    public function index()
    {

        //check if bartender have opened stocktaking
        $openedCount = stocktaking::where('user_id', Auth::id())->where('completed', false)->count();

        if ($openedCount == 1) {
            $started_bool = true;
        } else {
            $started_bool = false;
        }


        $drinks  = DB::table('stocktakings')->join('drink_stocktakings', function ($join) {
            $join->on('stocktakings.id', '=', 'drink_stocktakings.stocktaking_id');
        })->join('drinks', function ($join) {
            $join->on('drinks.id', '=', 'drink_stocktakings.drink_id');
        })
            ->select('drinks.id as drinkID', 'drinks.name as drinkName', 'drink_stocktakings.quantity as drinkQuantity', 'drink_stocktakings.weight as drinkWeight', 'stocktakings.id as stocktakingID')
            //->selectRaw('`drinks`.`id` as uid')
            ->where('drink_stocktakings.quantity', '=', null)
            ->orWhere('drink_stocktakings.weight', '=', null)
            ->get();







        return view('bartender.activeInventory')->with('started_bool', $started_bool)->with('drinks', $drinks);
    }


    public function createStocktaking()
    {


        $current_timestamp = Carbon::now()->timestamp;

        $stocktacking = new stocktaking();
        $stocktacking->user_id = Auth::id();
        //$stocktacking->start  = $current_timestamp;
        $stocktacking->save();

        $drinks = drink::all();

        //create empety fields for stocktaking
        foreach ($drinks as $drink) {

            $drink_stocktaking = new drink_stocktaking();

            $drink_stocktaking->stocktaking_id = $stocktacking->id;
            $drink_stocktaking->drink_id = $drink->id;
            $drink_stocktaking->quantity = null;


            //check if drink is weightable
            if ($drink->weightable == true) {
                //vrijednost koja mora da se mijenja
                $drink_stocktaking->weight = null;
            } else {
                //vrijednost koju ignoriramo
                $drink_stocktaking->weight = 0;
            }

            $drink_stocktaking->save();
        }



        return redirect('/aktivni-popis');
    }
}
