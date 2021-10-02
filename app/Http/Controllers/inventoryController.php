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


    public function additionalAddWeight($drinkID, $weight)
    {

        $activeStocktaking = stocktaking::where('user_id', '=', Auth::id())->where('completed', false)->first();

        $drink = drink::findOrFail($drinkID);

        $drink_stocktaking = drink_stocktaking::where('stocktaking_id', $activeStocktaking->id)->where('drink_id', $drinkID)->first();
        $drink_stocktaking->weight += ($weight - $drink->packing_weight);
        $drink_stocktaking->save();

        return redirect('/prestete-pijace')->with('successMessage', 'Uspesno ste posodobili popis');
    }


    //extra ADD QUANTITY
    public function additionalAddQuantity($drinkID, $quantity)
    {
        $activeStocktaking = stocktaking::where('user_id', '=', Auth::id())->where('completed', false)->first();

        $drink_stocktaking = drink_stocktaking::where('stocktaking_id', $activeStocktaking->id)->where('drink_id', $drinkID)->first();
        $drink_stocktaking->quantity += $quantity;
        $drink_stocktaking->save();

        return redirect('/prestete-pijace')->with('successMessage', 'Uspesno ste posodobili popis');
    }


    //prikazi prestete pijace
    public function countedStocktaking()
    {
        $drinks  = DB::table('stocktakings')->join('drink_stocktakings', function ($join) {
            $join->on('stocktakings.id', '=', 'drink_stocktakings.stocktaking_id');
        })->join('drinks', function ($join) {
            $join->on('drinks.id', '=', 'drink_stocktakings.drink_id');
        })
            ->select('drinks.id as drinkID', 'drinks.name as drinkName', 'drink_stocktakings.quantity as drinkQuantity', 'drink_stocktakings.weight as drinkWeight', 'stocktakings.id as stocktakingID')
            //->selectRaw('`drinks`.`id` as uid')
            ->where('drink_stocktakings.quantity', '!=', null)
            ->orWhere('drink_stocktakings.weight', '!=', 0)
            ->get();



        return view('bartender.countedStocktaking')->with('drinks', $drinks);
    }


    //add quantity to stocktaking
    public function addQuantity($drinkID, $quantity)
    {
        $activeStocktaking = stocktaking::where('user_id', '=', Auth::id())->where('completed', false)->first();

        $drink_stocktaking = drink_stocktaking::where('stocktaking_id', $activeStocktaking->id)->where('drink_id', $drinkID)->first();
        $drink_stocktaking->quantity = $quantity;
        $drink_stocktaking->save();

        return redirect('/aktivni-popis')->with('successMessage', 'Uspesno ste posodobili popis');
    }


    public function addWeight($drinkID, $weight)
    {
        $activeStocktaking = stocktaking::where('user_id', '=', Auth::id())->where('completed', false)->first();

        $drink = drink::findOrFail($drinkID);

        $drink_stocktaking = drink_stocktaking::where('stocktaking_id', $activeStocktaking->id)->where('drink_id', $drinkID)->first();

        //preveri ce je embelaza tezja vnesene teze pijace
        if ($drink->packing_weight > $drink_stocktaking->weight) {
            return redirect()->back()->with('errorMessage', 'Greska pri vnosu, vnesena teza je manjsa od teze embelaze');
        }

        $drink_stocktaking->weight = $weight - $drink->packing_weight;
        $drink_stocktaking->save();

        return redirect('/aktivni-popis')->with('successMessage', 'Uspesno ste posodobili popis');
    }


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

        return view('bartender.activeStocktaking')->with('started_bool', $started_bool)->with('drinks', $drinks);
    }


    // search on active stocktaking
    public function searchActiveStocktaking($query)
    {
        //check if bartender have opened stocktaking
        $openedCount = stocktaking::where('user_id', Auth::id())->where('completed', false)->count();

        if ($openedCount == 1) {
            $started_bool = true;
        } else {
            $started_bool = false;
        }

        //search for drinks that are left on stocktaking
        $drinks  = DB::table('stocktakings')->join('drink_stocktakings', function ($join) {
            $join->on('stocktakings.id', '=', 'drink_stocktakings.stocktaking_id');
        })->join('drinks', function ($join) {
            $join->on('drinks.id', '=', 'drink_stocktakings.drink_id');
        })
            ->select('drinks.id as drinkID', 'drinks.name as drinkName', 'drink_stocktakings.quantity as drinkQuantity', 'drink_stocktakings.weight as drinkWeight', 'stocktakings.id as stocktakingID')
            //->selectRaw('`drinks`.`id` as uid')
            ->where('drinks.name', 'LIKE', "%$query%")
            ->where(function ($execute) {
                $execute->where('drink_stocktakings.quantity', '=', null)
                    ->orWhere('drink_stocktakings.weight', '=', null);
            })
            ->get();

        return view('bartender.activeStocktaking')->with('started_bool', $started_bool)->with('drinks', $drinks);
    }


    //SEARCH COUNTED STOCKTAKING
    public function searchCountedStocktaking($query)
    {
        $drinks  = DB::table('stocktakings')->join('drink_stocktakings', function ($join) {
            $join->on('stocktakings.id', '=', 'drink_stocktakings.stocktaking_id');
        })->join('drinks', function ($join) {
            $join->on('drinks.id', '=', 'drink_stocktakings.drink_id');
        })
            ->select('drinks.id as drinkID', 'drinks.name as drinkName', 'drink_stocktakings.quantity as drinkQuantity', 'drink_stocktakings.weight as drinkWeight', 'stocktakings.id as stocktakingID')
            ->where('drinks.name', 'LIKE', "%$query%")
            ->where(function ($execute) {
                $execute->where('drink_stocktakings.quantity', '!=', null)
                    ->orWhere('drink_stocktakings.weight', '!=', 0);
            })
            //->where('drink_stocktakings.quantity', '!=', null)
            //->orWhere('drink_stocktakings.weight', '!=', 0)
            ->get();
        return view('bartender.countedStocktaking')->with('drinks', $drinks);
    }

    // Create stocktaking
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

    public function completeStocktakingCheck()
    {
        $drinks  = DB::table('stocktakings')->join('drink_stocktakings', function ($join) {
            $join->on('stocktakings.id', '=', 'drink_stocktakings.stocktaking_id');
        })->join('drinks', function ($join) {
            $join->on('drinks.id', '=', 'drink_stocktakings.drink_id');
        })
            ->select('drinks.name as drinkName')
            ->where('drink_stocktakings.quantity', '=', null)
            ->orWhere('drink_stocktakings.weight', '=', null)
            ->get();

        return view('bartender.completeStocktaking')->with('drinks', $drinks);
    }

    public function confirmStocktaking()
    {
        //get current timestamp
        $current_timestamp = Carbon::now()->timestamp;

        //close stocktaking
        $activeStocktaking = stocktaking::where('user_id', '=', Auth::id())->where('completed', false)->first();
        $activeStocktaking->end = $current_timestamp;
        $activeStocktaking->completed = true;
        $activeStocktaking->save();

        return redirect('/aktivni-popis')->with('successMessage', 'Uspešno ste oddali popis');
    }
}
