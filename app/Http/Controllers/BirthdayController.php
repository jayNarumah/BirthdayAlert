<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Log;
use \Illuminate\Support\Facades\DB;
use \App\Models\Profile;
use \App\Models\User;
use \App\Models\Group;
use \App\Models\GroupMember;

class BirthdayController extends Controller
{
    function birthdays()
    {
        $day = date("d");
        $month = date("m");
        $like = "%-".$month."-" . $day . " %";

        $profiles = Profile::where('dob', 'like', $like)->get();

        return response()->json($profiles, 201);
    }

    function birthdaysCount()
    {
        $day = date("d");
        $month = date("m");
        $like = "%-".$month."-" . $day . " %";

        $count = Profile::where('dob', 'like', $like)->count();

        return response()->json($count, 201);
    }

    function birthdayCount()
    {
        $like = "%-" . date("m") ."-" . date("d") . " %";
        $group = auth()->user()->group;
        $group_id = $group->id;

        $count = GroupMember::where('group_id', $group_id)->count();

        return response()->json($count, 201);
    }

    function birthday()
    {
        $like = "%-" . date("m") ."-" . date("d") . " %";
        $group = auth()->user()->group;
        $group_id = $group->id;

        Log::alert("Group :" . $group_id);

        $birthdays = [];
        $index = 0;

        $group_members = GroupMember::where('group_id', $group_id)->get();
        // $group_members = $groups->groupMembers;

        foreach($group_members as $group_member )
        {

            $profile = Profile::where('id', $group_member->profile_id)
                              ->where('dob', 'like', $like)->get();

            $birthdays[$index] = $profile;
            $index += 1;
         }

         return response()->json($birthdays, 201);

     }
}
