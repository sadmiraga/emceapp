<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //

    //
    public function prvi($r)
    {

        $pi = pi();
        $ploscina = $pi * ($r * $r);

        return $ploscina;
    }

    public function drugi($testString)
    {

        $testArray = str_split($testString);

        $check = ctype_upper($testArray[0]);

        if ($check) {
            echo 'Zacne se z vlko';
        } else {
            echo 'nah';
        }
    }


    public function blez()
    {
        $numbers = array(1, 2, 3, 4, 5);

        $vsota = 0;
        foreach ($numbers as $number) {
            $vsota += $number;
        }

        return $vsota;
    }
}
