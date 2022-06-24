<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Profile;
use \App\Models\GroupMember;

class GroupAdminController extends Controller
{
    function getMyGroupName()
    {
        return response()->json(auth()->user()->group, 200);
    }

    function addMember(Request $request)
    {
        $rules = $request->validate([
            'email' => 'required|email',
            'group_id' => 'required'
        ]);

        $profile = Profile::where('email', $request->email)->first();

        if($profile?->id > 0)
        {
            $group_member = GroupMember::where('profile_id', $profile->id)
                                       ->where('group_id', $request->group_id);
            if($group_member)
            {
                $member = GroupMember::where('profile_id', $profile->id)
                                     ->where('group_id', $request->group_id);
                if($member)
                {
                    return response()->json("User already existed in the Group", 200);
                }
                $member = GroupMember::create([
                    'profile_id' => $profile->id,
                    'group_id' => $request->group_id
                ]);

            }
        }
        else
            {
                $member = "profile Does not Exist Yet!!!";

            }

        return response()->json($member, 201);
    }
}
