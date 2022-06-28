<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use \App\Models\Profile;
use \App\Models\User;

class SuperAdminController extends Controller
{
    function count()
    {
        $count=User::where('is_active', true)->count() - 1;

        return response()->json($count, 200);
    }

    function profileCount()
    {
        $count=Profile::where('is_active', true)->count();

        return response()->json($count, 200);
    }

    function createAdmin(Request $request)
    {
        $rules=$request->validate([
            'group_id' => '[required]',
            'profile_id' =>'[required]',
            //'email' => 'required|email',
            'password' => '[required,min:6,max:30]',
        ]);

        //$rules['group_name'] = ucwords($request->group_name);


        $profile = Profile::findOrFail($request->profile_id);

        $user = User::create([
            'profile_id' => $request->profile_id,
            'group_id' => $request->group_id,
            'email' => $profile->email,
            'password' => bcrypt($rules['password']),
        ]);

        return response()->json($user->load('group', 'profile'), 201);
    }


}
