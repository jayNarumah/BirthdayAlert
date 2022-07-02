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
        $count = auth()->user()->group->groupMembers->count();

        return response()->json($count, 200);
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
            'email' => 'required|email|exists:profiles,email',
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
               return response()->json($profile->name . 'was already a member Here !!!', 403);

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
                $member = response()->json("profile Does not Exist Yet!!!", 403);
            }
    }
}
