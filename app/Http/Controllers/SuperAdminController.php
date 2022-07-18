<?php

namespace App\Http\Controllers;

use App\Models\GroupAdmin;
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
        $count=Profile::where('is_active', true)->count() -1;

        return response()->json($count, 200);
    }

    function createAdmin(Request $request)
    {
        $rules=$request->validate([
            'group_id' => '[required]',
            'profile_id' =>'[required]',
            //'email' => 'required|email',
            // 'password' => '[required,min:6,max:30]',
        ]);

        $admin = GroupAdmin::create([
            'user_id' => $rules['user_id'],
            'group_id' => $rules['group_id']
        ]);

        //$rules['group_name'] = ucwords($request->group_name);


        // $profile = Profile::where('group_id', $request->group_id)->count();

        // if ($profile > 0) {
        //     return response()->json("Group already have an admin!!!", 304);
        // }

        // $user = User::create([
        //     'profile_id' => $request->profile_id,
        //     'group_id' => $request->group_id,
        //     'email' => $profile->email,
        //     'password' => bcrypt($rules['password']),
        // ]);

        return response()->json($admin, 201);
    }
}
