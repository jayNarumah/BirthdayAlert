<?php

namespace App\Http\Controllers;

use App\Models\GroupAdmin;
use App\Models\GroupMember;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

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
            'group_id' => 'required',
            'email' => 'required',
        ]);

        $group = GroupAdmin::where('group_id', $request->group_id)->count();

        if ($group > 0)
        {
            return response()->json("Group Admin was already assign to the Group", 200);
        }

        $user = User::where('email', $request->email)->first();
        $id = $user->id;
        $admin = GroupAdmin::where('user_id', $id)->first();

        if ($admin)
        {
            return response()->json("Selected User was already an Admin  to another group !!!", 200);
        }

        $admin = GroupAdmin::create([
            'group_id' => $request->group_id,
            'user_id' => $id,
        ]);
        $user = User::findOrFail($id);

        $group_member = GroupMember::create([
            'group_id' => $request->group_id,
            'profile_id' => $user->profile_id,
        ]);

        //$rules['group_name'] = ucwords($request->group_name);

        return response()->json($admin->load('group', 'user'), 201);
    }
}
