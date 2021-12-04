<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class basicController extends Controller
{
    public function errorPage()
    {
        return view('stock.errorPage');
    }


    public function accessDenied()
    {
        return view('stock.errorPage');
    }

    public function odjava()
    {
        Auth::logout();
        return redirect('/');
    }
}
