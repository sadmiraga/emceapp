<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//custom USE
use App\Models\stocktaking;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class archiveController extends Controller
{
    public function stocktakingIndex()
    {

        $stocktakings = DB::table('stocktakings')->join('users', function ($join) {
            $join->on('users.id', '=', 'stocktakings.user_id');
        })->select('users.firstName', 'users.lastName', 'stocktakings.completed', 'stocktakings.start', 'stocktakings.end', 'stocktakings.id')
            ->get();

        return view('director.stocktakingArchive')->with('stocktakings', $stocktakings);
    }


    public function inspectStocktaking($stocktakingID)
    {

        $stocktaking = stocktaking::findOrFail($stocktakingID);
        $user = User::findOrFail($stocktaking->user_id);

        $stocktakingDrinks = DB::table('stocktakings')->join('drink_stocktakings', function ($join) {
            $join->on('stocktakings.id', '=', 'drink_stocktakings.stocktaking_id');
        })->join('drinks', function ($join) {
            $join->on('drinks.id', '=', 'drink_stocktakings.drink_id');
        })
            ->select('drinks.id as drinkID', 'drinks.name as drinkName', 'drink_stocktakings.quantity as drinkQuantity', 'drink_stocktakings.weight as drinkWeight', 'stocktakings.id as stocktakingID')
            ->where('stocktakings.id', '=', $stocktakingID)
            ->get();

        //return $stocktakingDrinks;

        return view('director.displayStocktaking')->with('stocktaking', $stocktaking)->with('user', $user)->with('stocktakingDrinks', $stocktakingDrinks);
    }
}
