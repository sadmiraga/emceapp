<?php

namespace App\Http\Controllers;

use App\Models\tournament;
use App\Models\team;
use Illuminate\Http\Request;




class teamController extends Controller
{
    public function newTeam($tournamentID)
    {
        $tournament = tournament::findOrFail($tournamentID);
        return view('guest.newTeam')->with('tournament', $tournament);
    }

    public function newTeamExe(Request $request)
    {

        $team = new team();
        $team->teamname = $request->input('teamName');
        $team->member_1 = $request->input('member1');
        $team->member_2 = $request->input('member2');
        $team->tournament_id = $request->input('tournamentID');
        $team->contact_number = $request->input('number');
        $team->save();

        return redirect()->back()->with('successMessage', 'Uspešno ste prijavili ekipo na turnir');
    }
}
