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
        $like = "%-".$month."-" . $day;
        $groups = [];
        $profiles = [];
        $col = 0;
        $row = 0;

        //Checking for the Profiles whose birthdays are Today
        $profiles = Profile::where('dob', 'like', $like)->get();

        foreach($profiles as $profile)  //Iteration through to obtain their data
        {
            Log::alert("Hello ". $profile->name ." Your Receiving this Message  becouse Your Birthday is Today");
            //Mail::to($profile->email)->send(new SendMail($details)); //Sending Birthday Message to the user

            //getting his record that consist the groups he is in
            $group_members = GroupMember::where('profile_id', $profile->id)->get();

            foreach ($group_members as $group_member) //Iterating through to get multiple groups he belongs
            {

                if($group_member)
                {
                    $group = Group::findOrFail($group_member->group_id); //gettin his Group
                    $g_members = GroupMember::where('group_id', $group_member->id)->get(); //getting Co-members of the Group

                    foreach ($g_members as $g_member)
                    {
                        if($g_member)
                        {
                            //iterating through to send the birthday message
                            if ($g_member->profile_id != $profile->id) //Checking to see if his not the person having birthday
                            {
                                $mmber = Profile::findOrFail($g_member->profile_id);
                            //Mail::to($profile->email)->send(new SendMail($details));
                            Log::alert(" Hello " .$mmber->name." You are receiving this Message becouse Your Group Member ". $profile->name." on ". $group->group_name ."is celebrating birthday Today");
                            }
                        }
                    }

                }
            }
        }
    }
    function birthdays()
    {
        $day = date("d");
        $month = date("m");
        $like = "%-".$month."-" . $day;

        $profiles = Profile::where('dob', 'like', $like)->get();

        return response()->json($profiles, 201);
    }

    function birthdaysCount()
    {
        $day = date("d");
        $month = date("m");
        $like = "%-".$month."-" . $day;

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

                //if($profile->dob == date('Y-m-d'))
                //{
                    $id[$index] = $group_member->profile_id;
                    $index = $index + 1;
               // }
            }
        }

        $birthdays = Profile::whereIn('id', $id)->orderBy('gender', 'desc')->get();

        return response()->json($birthdays, 201);
    }
}
