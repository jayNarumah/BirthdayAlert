<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\GroupMember;
use App\Models\Profile;

class GroupAdminController extends Controller
{
    function count()
    {
        $id = auth()->user()->group->id;
        $users = GroupMember::where('group_id', $id)->count();

        return response()->json($users, 201);
    }

    function getMyGroupName()
    {
        $group = auth()->user()->group;
        return response()->json($group->group_name, 200);
    }

    function admin()
    {
        $admin = auth()->user()->profile;
        return response()->json($admin->name, 200);
    }

    function addMember(Request $request)
    {
        $rules = $request->validate([
            'email' => 'required|email',
        ]);

        $group = auth()->user()->group;
        $group_id = $group->id;

        $profile = Profile::where('email', $request->email)->first();

        if($profile?->id > 0)
        {
            $group_member = GroupMember::where('profile_id', $profile->id)
                                       ->where('group_id', $group_id)->first();
            Log::alert($group_member);

            if($group_member)
            {
               return response()->json($profile->name . 'was already a member Here !!!', 200);

            }
            else {
                $member = GroupMember::create([
                    'profile_id' => $profile->id,
                    'group_id' => $group_id
                ]);
                return response()->json($member, 201);
            }
        }
        else
            {
                $member = response()->json("profile Does not Exist Yet!!!", 200);
            }


    }
}
