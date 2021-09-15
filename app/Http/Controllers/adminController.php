<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\userType;

class adminController extends Controller
{


    //get user description
    public function getDescription(Request $request)
    {

        $description = userType::where('id', $request->input('typeID'))->pluck('description', 'id');
        return response()->json($description);
    }


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
        $selectedUserType = userType::findOrFail($user->type_id);
        $userTypes = UserType::all();
        return view('admin.editUser')->with('user', $user)->with('userTypes', $userTypes)->with('selectedUserType', $selectedUserType);
    }

    //execute editing user
    public function editUserExe(Request $request)
    {
        $user = User::findOrFail($request->input('userID'));
        $user->type_id = $request->input('type_id');
        $user->save();

        return redirect('/zaposleni')->with('message', 'Uspešno ste premenili tip zaposlenega');
    }
}
