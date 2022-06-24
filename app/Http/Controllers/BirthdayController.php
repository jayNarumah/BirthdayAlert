<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Log;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Mail;
use \App\Mail\BirthdayAlertMail;
use \App\Mail\NotificationMail;
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

        //Checking for the Profiles whose birthdays are Today
        $profiles = Profile::where('dob', 'like', $like)->get();

        foreach($profiles as $profile)  //Iteration through to obtain their data
        {
            $details = [
                'name' => $profile->name,
                'email' => $profile->email,
                'group_name' => '',
            ];

            Log::Info($profile->id . " Hello ". $profile->name ." Your Receiving this Message  becouse Your Birthday is Today");
            //Mail::to($profile->email)->queue(new BirthdayAlertMail($details)); //Sending Birthday Message to the user

            //getting his record that consist the groups he is in
            $user_groups = GroupMember::where('profile_id', $profile->id)->get();

            foreach ($user_groups as $user_group) //Iterating through to get multiple groups he belongs
            {
                Log::alert($profile->id . " BelogsTo : " . $user_group?->group_id);


                if($user_group->profile_id == $profile->id) //recheck the selected user if he is the targeted user
                {
                    $group = Group::findOrFail($user_group->group_id); //getting his Group
                    $group_members = GroupMember::where('group_id', $group->id)->get(); //getting Co-members of the Group

                    $details['group_name'] = $group->group_name;

                    foreach ($group_members as $group_member)
                    {
                        if($group_member->profile_id != $user_group->profile_id)
                        {
                            //iterating through to send the birthday message

                        if ($group_member->profile_id != $profile->id) //Checking to see if his not the person having birthday
                        {
                        $member = Profile::findOrFail($group_member->profile_id);

                     // Mail::to($profile->email)->queue(new NotificationMail($details)); //Sending Birthday Message to the user

                         Log::Info($member->id . " Hello " .$member->name." You are receiving this Message becouse Your Group Member ". $profile->name." on ". $group->group_name ."is celebrating birthday Today");
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
