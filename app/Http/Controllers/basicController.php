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

    public function adminRedirect()
    {

        if ($user = Auth::user()) {

            $role = Auth::user()->type_id;

            switch ($role) {

                case 4:
                    return redirect('/meni');
                    break;
                case 3:
                    return redirect('/dogodki');
                    break;
                case 2:
                    return redirect('/aktivni-popis');
                    break;

                default:
                    return redirect('/');
                    break;
            }
        } else {

            //not really important
            return redirect('/pijace');
        }
    }
}
