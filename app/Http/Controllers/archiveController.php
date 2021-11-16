<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//custom USE
use App\Models\stocktaking;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use App\Models\compareModel;

use \stdClass;

//use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade as PDF;

//Excel
use Importer;
use LengthException;

class archiveController extends Controller
{

    public function printStocktaking($stocktakingID)
    {

        $stocktaking = stocktaking::findOrFail($stocktakingID);
        $user = User::findOrFail($stocktaking->user_id);

        $stocktakingDrinks = DB::table('stocktakings')->join('drink_stocktakings', function ($join) {
            $join->on('stocktakings.id', '=', 'drink_stocktakings.stocktaking_id');
        })->join('drinks', function ($join) {
            $join->on('drinks.id', '=', 'drink_stocktakings.drink_id');
        })
            ->select('drinks.id as drinkID', 'drinks.name as drinkName', 'drinks.enme as enme', 'drinks.packing_size as packing_size', 'drink_stocktakings.quantity as drinkQuantity', 'drink_stocktakings.weight as drinkWeight', 'stocktakings.id as stocktakingID')
            ->where('stocktakings.id', '=', $stocktakingID)
            ->get();


        $fileName = 'Popis  ' . date('d-m-Y', strtotime($stocktaking->start)) . '-' . $user->firstName . '-' . $user->lastName . '.pdf';

        $pdf = PDF::loadView('stock.stocktakingPDF', ['stocktakingDrinks' => $stocktakingDrinks, 'user' => $user, 'stocktaking' => $stocktaking]);
        return $pdf->download($fileName);
    }


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
            ->select('drinks.id as drinkID', 'drinks.name as drinkName', 'drinks.packing_size as packing_size', 'drinks.enme as enme', 'drink_stocktakings.quantity as drinkQuantity', 'drink_stocktakings.weight as drinkWeight', 'stocktakings.id as stocktakingID')
            ->where('stocktakings.id', '=', $stocktakingID)
            ->get();


        return view('director.displayStocktaking')->with('stocktaking', $stocktaking)->with('user', $user)->with('stocktakingDrinks', $stocktakingDrinks);
    }

    public function compareStocktaking($stocktakingID)
    {
        $stocktaking = stocktaking::findOrFail($stocktakingID);
        $user = User::findOrFail($stocktaking->user_id);

        return view('director.compareStocktaking')->with('stocktaking', $stocktaking)
            ->with('user', $user)
            ->with('odstupanja', null);
    }

    public function compareStocktakingExe(Request $request)
    {
        //check if excel file is uploaded
        $this->validate($request, [
            'excelFile'  => 'required|mimes:xls,xlsx'
        ]);


        $stocktakingDrinks = DB::table('stocktakings')->join('drink_stocktakings', function ($join) {
            $join->on('stocktakings.id', '=', 'drink_stocktakings.stocktaking_id');
        })->join('drinks', function ($join) {
            $join->on('drinks.id', '=', 'drink_stocktakings.drink_id');
        })
            ->select('drinks.code as code', 'drinks.id as drinkID', 'drinks.name as drinkName', 'drinks.packing_size as packing_size', 'drinks.enme as enme', 'drink_stocktakings.quantity as drinkQuantity', 'drink_stocktakings.weight as drinkWeight', 'stocktakings.id as stocktakingID')
            ->where('stocktakings.id', '=', $request->input('stocktakingID'))
            ->get();

        $path = $request->file('excelFile')->getRealPath();

        $excel = Importer::make('Excel');
        $excel->load($path);
        $collection = $excel->getCollection();

        //get heading of compare
        //$compareDate = $collection[2];

        //headings
        //$collection[3]

        //sirina = 13
        // 0 = skupina
        // 1 = Šifra
        // 9 = Zaloga

        //$comparingVariable = new stdClass;

        //return $collection[4];

        //return $collection[4][1];

        $odstupanja = [];

        //odstupanja|    name, enme, value


        foreach ($stocktakingDrinks as $drink) {
            for ($i = 4; $i <= count($collection); $i++) {

                //find product by code
                if ($collection[$i][1] == $drink->code) {

                    array_push($odstupanja, $drink->drinkName);

                    //KOM
                    if ($drink->enme == "KOM") {
                        array_push($odstupanja, "KOM", (int)$collection[$i][9] - $drink->drinkQuantity);

                        //KG
                    } else if ($drink->enme == "KG") {
                        array_push($odstupanja, "KG", (float)$collection[$i][9] - $drink->drinkWeight);

                        //LIT
                    } else if ($drink->enme == "LIT") {
                        array_push($odstupanja, "LIT", (float)$collection[$i][9] - ($drink->drinkQuantity * $drink->packing_size + $drink->drinkWeight));
                    }

                    break;
                }
            }
        }

        $stocktaking = stocktaking::findOrFail($request->input('stocktakingID'));

        return view('director.displayComparedStocktaking')->with('odstupanja', $odstupanja);
    }
}
