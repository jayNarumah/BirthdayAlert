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
    function dailyBirthday()
    {
        $day = date("d");
        $month = date("m");
        $like = "%-".$month."-" . $day . " %";
        $groups = [];
        $profiles = [];
        $col = 0;
        $row = 0;

        $profiles = Profile::where('dob', 'like', $like)->get();

        foreach($profiles as $profile)
        {
            $group_members = GroupMember::where('profile_id', $profile->id)->first();
            if($group_members != null)
            {
                Log::alert("message");
                return response()->json($group_members, 200);

            }


            if($profile->gender == 'Male')
            {
                $gender = "He";
            }
            else{
                $gender = "She";
            }
           // try{
                $details = [
                    'name' => $profile->name,
                    'dob' => $profile->dob,
                    'gender' => $gender,

                ];
                //Mail::to($profile->email)->send(new SendMail($details));
                $group_members = GroupMember::where('profile_id', $profile->id)->first();
                $group = $group_members?->group;
                return response()->json($group, 200);
                Log::Info("Send Message to Birthday Partner" . $profile->email . " on" . Group::find());
                if ($profiles->group_members != null)
                {
                    foreach ($profiles->group_members as $member)
                    {
                        if($profiles->groupMembers != null)
                        {
                        Log::alert("Gud");
                        }
                    }
                }
        }

        $this->info('Hourly Update has been send successfully');
    }
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

        $count = GroupMember::where('group_id', $group->id)->count();

        return response()->json($count, 201);
    }

    function birthday()
    {
        $like = "%-" . date("m") ."-" . date("d") ;
        $group = auth()->user()->group;

        $id = [];
        $index = 0;

        $group_members = GroupMember::where('group_id', $group->id)->get();

        foreach($group_members as $group_member )
        {
            $profile = Profile::where('id', $group_member->profile_id)
                            ->where('dob', 'like', $like)->first();

            if ($profile != null)
            {
                if($profile->dob == date('Y-m-d'))
                {
                    $id[$index] = $group_member->profile_id;
                    $index = $index + 1;
                }
            }
        }

        $birthdays = Profile::whereIn('id', $id)->orderBy('gender', 'desc')->get();

        return response()->json($birthdays, 201);
    }
}
