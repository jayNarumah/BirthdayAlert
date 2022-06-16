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
        $groups = [];
        $grps = Group::where('is_active', true)->get();

        foreach($grps as $grp)
        {
            //
            $user = User::findOrFail( $grp->admin_id);
            Log::alert($user->profile_id);
            $profile = Profile::findOrFail($user->profile_id);


            $groups[$index][0] = $user->group;
            $groups[$index][1] =  $profile;

            $index+=1;
        }
        //$groups = $groups->user->profile;

        return response()->json( $groups, 201);
    }

    function count()
    {
        $groups = Group::where('is_active', true)->count();

        return response()->json($groups, 201);
    }

    function store(Request $request)
    {
        $rules=$request->validate([
            'group_name' => 'required|min:3|max:250',
            'admin_id' => 'required|min:1'
        ]);

        $group = Group::create($rules);
        return response()->json($group, 201);

    }

    function show(Request $request)
    {
        $group = [];
        $grp = Group::findOrFail($request->id);

            $user = User::findOrFail( $grp->admin_id);
            Log::alert($user->profile_id);
            $profile = Profile::findOrFail($user->profile_id);


            $group[0][0] = $user->group;
            $group[0][1] =  $profile;

        return response()->json($group, 201);
    }

    function update(Request $request)
    {
        $id = $request->id;
        $grp = Group::findOrFail($id);

       // $grp->update( ['is_active' => false]);
        $grp->is_active = false;
        $grp->save();

        return response()->json($grp, 201);

    }
}
