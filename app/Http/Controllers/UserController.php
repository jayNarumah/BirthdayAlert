<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Log;
use \App\Models\Profile;
use \App\Models\Group;
use \App\models\GroupMember;
use \App\Http\Resources\UserResource;

class UserController extends Controller
{
    function index()
    {
        $id = auth()->user()->profile_id;
        Log::alert('Admin Id; ' . $id);
        $group = Group::where('admin_id', $id)->first();
        Log::alert($group->id);
        $users = GroupMember::where('group_id', $group->id)->get();

        return response()->json($users, 201);
    }

    function count()
    {
        $id = auth()->user()->profile_id;
        Log::alert('Admin Id; ' . $id);
        $group = Group::where('admin_id', $id)->first();
        Log::alert($group->id);
        $users = GroupMember::where('group_id', $group->id)->count();

        return response()->json($users, 201);
    }

    function store(Request $request)
    {
        $rules=$request->validate([
            'name' => 'required|min:3|max:200',
            'email' => 'required|email|min:6',
            'phone_number' => 'required|min:11|max:13',
            'gender' => 'min:4|max:20',
            'dob' => 'required|min:4'
        ]);

        //$rules['name'] = ucwords($request->name);
        $admin_id = auth()->user()->id;
        Log::info($admin_id);
        $group = Group::findOrFail($admin_id);
        $group_id = $group->id;
        $rules['user_type_id'] = 3;

        $profile = Profile::create($rules);

        $group_member = GroupMember::create([
            'profile_id' => $profile->id,
            'group_id' => $group_id,
            'is-active' => true
        ]);

        //return new UserResource($profile);
        return response()->json([
            'profile' =>$profile,
            'group_member' => $group_member
            ], 201);
    }


    function show(Request $request)
    {
        $id = $request->id;
        $user = Profile::findOrFail($id);

        return response()->json($user, 200);
    }

    function update(Request $request)
    {
        $rules=$request->validate([
            'name' => 'required|min:3|max:200',
            'email' => 'required|email',
            'phone_number' => 'required|min:11|max:13',
            'gender' => 'min:4|max:20',
            'dob' => 'required|min:5',
        ]);

        $id = $request->profile_id;
        //$rules['name'] = ucwords($request->name);
        $prfl = Profile::findOrFail($id);
        $usr = where('profile_id', $id);

        $profile = $prfl->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'dob' => $request->dob,
            'gender' => $request->gender,
        ]);


        return response()->json( $user, 201);

    }

    function destroy(Request $request)
    {
        $id = $request->id;

        $user=Profile::findOrFail($id);

        $user->is_active = false;
        $user->save();

        return response()->json($user, 201);

    }
}
