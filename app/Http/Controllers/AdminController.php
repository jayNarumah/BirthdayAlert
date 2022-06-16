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
        $admins=User::all();

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
        try{
        $details = 'Krunal';
        Mail::to('jawadrumah@gmail.com')->send(new SendMail($details));

            Log::info("Email Sent Successfully!!!");
        } catch (\Throwable $e) {
            throw $e;
        }
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
                'profile_id' => $profile->id
            ]);

            $id = $request->group_id;
            Log::info($id);
            $group = Group::find($id);
            $group->admin_id = $user->id;

            $group->save();

            $details = [
                'tittle' => 'My Tittle',
                // 'id' => $request->profile_id
            ];

            //Log::debug($details);

            try {
                //Mail::to($request->email)->queue(new \App\Mail\NotificationMail($details));
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
                Mail::to($profile->email)->send(new SendMail($details));
                Log::info("Email Sent Successfully!!!");
            } catch (\Throwable $e) {
                throw $e;
            }

            return response()->json([
                'profile' => $profile,
                'user' => $user,
                'group' =>$group
            ], 201);
      //  }
      //  return response()->json($profile, 201);
    }

    function show(Request $request)
    {
        $id = $request->id;
        $user = Profile::findOrFail($id);

        return response()->json($user, 200);
    }

    function update(Request $request)
    {
        $id = $request->id;
        //Log::alert($request->id);
        $rules=$request->validate([
            'name' => 'required|min:3|max:200',
            'email' => 'required|email',
            'phone_number' => 'required|min:11|max:13',
            'gender' => 'min:4|max:20',
            'dob' => 'required|min:5',
        ]);

        //$rules['name'] = ucwords($request->name);
        $prfl = Profile::findOrFail($id);
        //$usr = $prfl->user;
        $usr = User::where('profile_id', $id);

        $profile = $prfl->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'dob' => $request->dob,
            'gender' => $request->gender,
        ]);

        //$usr = User::where('profile_id', $id)->get();
        $user = $usr->update([
            'email' => $request->email,
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
        $usr=User::findOrFail($request->id);

        $user = $usr->update([
            'is_active' => false,
        ]);

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
