<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Group;
use \App\Models\User;
use \App\Models\Profile;
use \Illuminate\Support\Facades\Log;

class GroupController extends Controller
{
    function index()
    {
        $index = 0;
        $groups_list = [];
        $temp = [];
        $groups = Group::where('is_active', true)->get();

        foreach($grps as $grp)
        {
            $user = User::findOrFail( $grp->admin_id);
            Log::alert($user->profile_id);
            $profile = Profile::findOrFail($user->profile_id);
            $temp[0] = $user->group;
            $temp[1] = $profile;

            $groups[$index] = $temp;

            $index+=1;
        }
        $groups = $groups->user->profile;

        return response()->json( $groups, 200);
    }

    function count()
    {
        $groups = Group::where('is_active', true)->count();

        return response()->json($groups, 201);
    }

    function store(Request $request)
    {
        $rules=$request->validate([
            'group_name' => 'required|min:3|max:250'
        ]);

        $group = Group::create([
            'group_name' => $request->group_name
        ]);

        // if($request->admin_id > 0)
        // {
        //     $admin = User::findOrFail($request->admin_id);
        //     $admin = update([
        //         'group_id' => $group->id,
        //     ]);

        //     return response()->json([
        //         'group' => $group,
        //         'admin' => $admin,
        //     ], 201);
        // }
        return response()->json($group, 201);

    }

    function show(Request $request)
    {
        $group = User::where('group_id', $request->id)->first();

        return response()->json($group->load('group'), 201);
    }

    function update(Request $request)
    {
        $id = $request->id;
        $group = Group::findOrFail($id);

        Log::alert($request->group_name);

        $group->update([
            'group_name' => $request->group_name
        ]);

        return response()->json($group, 201);

    }

    function destroy(Request $request)
    {
        $grp = Group::findOrFail($request->id);
        $grp->is_active = false;
        $grp->save();

        return response()->json($grp->group_name . "Was Successfully Deleted!!! ", 201);

    }
}
