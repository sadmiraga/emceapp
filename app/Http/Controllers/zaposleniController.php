<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class zaposleniController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users')->with('users', $users);
    }
}
