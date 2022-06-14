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

    function birthday()
    {
        $day = date("d");
        $month = date("m");
        $like = "%-".$month."-" . $day . " %";
        $id = auth()->user()->id;
        Log::info($id);
        $groups = Group::where('admin_id', $id)->get();

        $birthdays = [];
        $index = 0;

        foreach($groups as $group)
        {
            $group_members = GroupMember::where('group_id', $group->id)->get();

            foreach($group_members as $group_member )
        {

            $profile = Profile::where('id', $group_member->profile_id)
                                ->where('dob', 'like', $like)->get();

            $birthdays[$index] = $profile;
            $index += 1;
        }
        }

            return response()->json($birthdays, 201);

        }
}
