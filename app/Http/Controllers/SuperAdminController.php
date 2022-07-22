<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\NotificationMail;
use Illuminate\Http\Request;
use App\Models\GroupMember;
use App\Models\GroupAdmin;
use App\Models\Profile;
use App\Models\User;

class SuperAdminController extends Controller
{
    function count()
    {
        $count=User::where('is_active', true)->count() - 1;

        return response()->json($count, 200);
    }

    function profileCount()
    {
        $count=Profile::where('is_active', true)->count() -1;

        return response()->json($count, 200);
    }

    function createAdmin(Request $request)
    {
        $rules=$request->validate([
            'group_id' => 'required',
            'user_id' => 'required',
        ]);

        // Log::alert($request->user_id);
        // exit();

        $group = GroupAdmin::where('group_id', $request->group_id)->count();

        if ($group > 0)
        {
            return response()->json("Group Admin was already assign to the Group", 403);
        }

        // $user = User::where('email', $request->email)->first();
        $id = $request->user_id;
        $admin = GroupAdmin::where('user_id', $id)->first();

        if ($admin)
        {
            return response()->json("Selected User was already an Admin  to another group !!!", 403);
        }

        $admin = GroupAdmin::create([
            'group_id' => $request->group_id,
            'user_id' => $id,
        ]);
        $user = User::findOrFail($id);

        $group_member = GroupMember::create([
            'group_id' => $request->group_id,
            'profile_id' => $user->profile_id,
        ]);

        //$rules['group_name'] = ucwords($request->group_name);
        try {
            $profile = $user->profile;

            $details = [
                'name' => $profile->name,
                'email' => $profile->email,
                'dob' => $profile->dob,
                'password' => $request->password,
            ];

            Mail::to($request->email)->queue(new \App\Mail\NotificationMail($details));

        Log::info("Email Sent Successfully!!!");
    } catch (\Throwable $e) {
        throw $e;
    }

        return response()->json($admin->load('group', 'user'), 201);
    }
}
