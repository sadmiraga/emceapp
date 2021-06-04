<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\userType;

class adminController extends Controller
{
    //display users
    public function usersIndex()
    {
        $users =  DB::table('users')->join('user_types', function ($join) {
            $join->on('user_types.id', '=', 'users.type_id');
        })->select('*')->get();
        return view('admin.users')->with('users', $users);
    }

    //display edit user
    public function editUserIndex($userID)
    {
        $user = User::findOrFail($userID);
        $userType = userType::findOrFail($user->type_id);
        $userTypes = UserType::all();
        return view('admin.editUser')->with('user', $user)->with('userTypes', $userTypes)->with('userType', $userType);
    }

    //execute editing user
    public function editUserExe(Request $request)
    {
        $user = User::findOrFail($request->input('userID'));
        $user->type_id = $request->input('type_id');
        $user->save();

        return redirect()->back()->with('messsage', 'Uspešno ste premenili tip zaposlenega');
    }
}
