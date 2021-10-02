<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//custom USE
use App\Models\stocktaking;
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
        return $stocktakingID;
    }
}
