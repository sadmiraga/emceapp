<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class basicController extends Controller
{
    public function errorPage()
    {
        return view('stock.errorPage');
    }

    public function odjava(){
        auth()->logout();
        return redirect('/');
    }
}
