<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Mail;
use \Illuminate\Support\Facades\Log;
use \App\Models\Group;
use \App\Models\Profile;
use \App\Models\User;
use \App\Mail\SendMail;

class AdminController extends Controller
{
    // function mail()
    // {
    //     try{
    //         $details = 'Krunal';
    //         Mail::to('jawadrumah@gmail.com')->send(new SendMail($details));

    //             Log::info("Email Sent Successfully!!!");
    //         } catch (\Throwable $e) {
    //             throw $e;
    //         }
    // }

    function index()
    {
        $admins=User::where('is_active', true)->get();

        return response()->json($admins->load('group','profile'), 200);
    }

    function count()
    {
        $count=User::where('is_active', true)->count();

        return response()->json($count, 200);
    }

    function profileCount()
    {
        $count=Profile::where('is_active', true)->count();

        return response()->json($count, 200);
    }

    function store(Request $request)
    {
        $rules=$request->validate([
            'name' => 'required|min:3|max:200',
            'email' => 'required|email|unique:profiles,email',
            'password' => 'required|min:6',
            'phone_number' => 'required|min:11|max:13',
            'gender' => 'min:4|max:20',
            'dob' => 'required|min:5',
        ]);

        $rules['password'] = bcrypt($request->password);
        //$rules['name'] = ucwords($request->name);

        $profile = Profile::create($rules);

        // if(!$request->password =="")
        // {

            $user = User::create([
                'email' => $profile->email,
                'password' => bcrypt($request->password),
                'user_type_id' => 2,
                'profile_id' => $profile->id,
                'group_id' => $request->group_id
            ]);

            //Log::info($id);
            // $group = Group::findOrFail($request->group_id);
            // $group->update([
            //     'admin_id' => $user->id
            // ]);
           // $group->admin_id = $user->id;

           // $group->save();

            $details = [
                'tittle' => 'My Tittle',
                // 'id' => $request->profile_id
            ];

            //Log::debug($details);

            try {
                if($profile->gender == 'Male')
                {
                    $gender = "He";
                }
                else{
                    $gender = "She";
                }

                $details = [
                    'name' => $profile->name,
                    'dob' => $profile->dob,
                    'gender' => $gender,

                ];

                //Mail::to($request->email)->queue(new \App\Mail\NotificationMail($details));

                ///Mail::to($request->email)->send(new SendMail($details));

            Log::info("Email Sent Successfully!!!");
        } catch (\Throwable $e) {
            throw $e;
        }
            return response()->json([
                'profile' => $profile,
                'user' => $user,
            ], 201);
      //  }
      //  return response()->json($profile, 201);
    }

    function show(Request $request)
    {
        $user = User::findOrFail($request->id);

        return response()->json($user->load('profile', 'group'), 200);
    }

    function update(Request $request)
    {

        $rules=$request->validate([
            'name' => 'required|min:3|max:200',
            'email' => 'required|email',
            'phone_number' => 'required|min:11|max:13',
            'gender' => 'required|min:4|max:20',
            'dob' => 'required|min:5',
            'group_id' => 'required',
        ]);

        //$rules['name'] = ucwords($request->name);
        $usr = User::findOrFail($request->id);
        $prfl = $usr->profile;

        $profile = $prfl->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'dob' => $request->dob,
            'gender' => $request->gender,
        ]);
        //$prfl = Profile::findOrFail($id);

        //$usr = User::where('profile_id', $id)->get();
        $user = $usr->update([
            'email' => $request->email,
            'group_id' => $request->group_id,
        ]);
        //$user->email = $request->email;
        //$user->save();

        return response()->json([
            'user' => $user,
            'profile' => $profile
        ], 201);

    }

    function destroy(Request $request)
    {
        $user=User::findOrFail($request->id);

        $user->is_active = false;
        $user->save();

        Log::alert($user);

        return response()->json("Admin Was Successfully Deleted !!!", 201);

    }

    // function createAdmin(Request $request)
    // {
    //     Log::alert($request->group_id);
    //     $rules=$request->validate([
    //         'group_id' => '[required]',
    //         'profile_id' =>'[required]',
    //         //'email' => 'required|email',
    //         'password' => '[required,min:6,max:30]',
    //     ]);

    //     //$rules['group_name'] = ucwords($request->group_name);


    //     $profile = Profile::findOrFail($request->profile_id);

    //     $user = User::create([
    //         'profile_id' => $request->profile_id,
    //         'email' => $profile->email,
    //         'password' => bcrypt($rules['password']),
    //     ]);

    //     $group = Group::findOrFail($request->group_id);

    //     $group = $group->update([
    //         'admin_id' => $user->id,
    //     ]);

    //    //$group->admin_id = $user->id;

    //    //$group->save();

    //     return response()->json($group, 201);
    // }



}
