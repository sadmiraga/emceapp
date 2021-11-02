<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tournament;
use App\Models\team;

class tournamentController extends Controller
{
    //
    public function closeApplication($tournamentID)
    {
        $tournament = tournament::findOrFail($tournamentID);
        $tournament->opened_applications = false;
        $tournament->save();
        return redirect('/turnir/' . $tournamentID)->with('successMessage', 'Uspešno ste zakljucili prijave na turnir');
    }

    public function index()
    {
        $tournaments = tournament::all();
        return view('admin.tournaments.tournamentsIndex')->with('tournaments', $tournaments);
    }

    public function new()
    {
        return view('admin.tournaments.newTournament');
    }

    public function singleTournament($tournamentID)
    {
        $tournament = tournament::findOrFail($tournamentID);
        $teams = team::where('tournament_id', $tournamentID)->get();

        return view('admin.tournaments.tournamentDetails')
            ->with('tournament', $tournament)
            ->with('teams', $teams);
    }

    public function newExe(Request $request)
    {

        //return $request;

        $tournament = new tournament();
        $tournament->name = $request->input('name');
        $tournament->prize = $request->input('prize');
        $tournament->startDate = $request->input('tournamentDate');
        $tournament->startTime = $request->input('tournamentTime');

        //COVER IMAGE
        $coverImage = $request->file('coverImage');
        if (!is_null($coverImage)) {
            //make name for image
            $var = date_create();
            $time = date_format($var, 'YmdHis');
            $imageName = $time . '-' . $request->input('name') . $coverImage->getClientOriginalName();

            $tournament->image = $imageName;

            //move image
            $coverImage->move(public_path('images/tournaments/covers'), $imageName);
        }

        //PRIZE IMAGE
        $prizeImage = $request->file('prizeImage');
        if (!is_null($coverImage)) {
            //make name for image
            $var = date_create();
            $time = date_format($var, 'YmdHis');
            $imageName = $time . '-' . $request->input('prize') . $prizeImage->getClientOriginalName();

            $tournament->prizeImage = $imageName;

            //move image
            $prizeImage->move(public_path('images/tournaments/prizes'), $imageName);
        }


        $tournament->save();

        return redirect('/turniri');
    }
}
