<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Log;
use \App\Models\Profile;
use \App\Models\Group;
use \App\models\GroupMember;
use \App\models\User;
use \App\Http\Resources\UserResource;

class UserController extends Controller
{
    function index()
    {

        $index = 0;
        $group_members = [];
        //
        $members = GroupMember::where('group_id', auth()->user()->group_id)->get();

        foreach($members as $member)
        {
            $profile = Profile::findOrFail($member->id);
            $group_members[$index] = $profile;
            Log::alert($member);

            $index+=1;
        }


        return response()->json($group_members, 201);
    }

    function count()
    {
        $id = auth()->user()->group->id;
        $users = GroupMember::where('group_id', $id)->count();

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
         $group = auth()->user()->profile;
        //$group = Group::where('admin_id', auth()->user()->id)->first();

        $profile = Profile::create($rules);
        Log::alert(auth()->user()->id);

        $group_member = GroupMember::create([
            'profile_id' => $profile->id,
            'group_id' => $group->id,
        ]);

        //return new UserResource($profile);
        return response()->json([
            'profile' =>$profile,
            'group' => $group
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
        $id = $request->id;
        //Log::alert($request->id);
        $rules=$request->validate([
            'name' => 'required|min:3|max:200',
            'email' => 'required|email',
            'phone_number' => 'required|min:11|max:13',
            'gender' => 'min:4|max:20',
            'dob' => 'required|min:5',
        ]);

        //$rules['name'] = ucwords($request->name);
        $prfl = Profile::findOrFail($id);

        $profile = $prfl->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'dob' => $request->dob,
            'gender' => $request->gender,
        ]);

        return response()->json( $profile, 201);

    }

    function destroy(Request $request)
    {
        $prfl=Profile::findOrFail($request->id);

        $profile = $prfl->update([
            'is_active' => false,
        ]);

        return response()->json("Group Member Was Successfully Deleted !!!", 201);

    }
}
