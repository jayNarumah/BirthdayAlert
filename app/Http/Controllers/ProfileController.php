<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\models\GroupMember;
use Illuminate\Support\Facades\Log;
use \App\Http\Resources\ProfileResource;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = auth()->user()->group->groupMembers;

        return ProfileResource::collection($members->load('profile'), 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        $group = auth()->user()->profile;

        $profile = Profile::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'dob' => $request->dob,
        ]);

        $group_member = GroupMember::create([
            'profile_id' => $profile->id,
            'group_id' => $group->id,
        ]);
        return new ProfileResource ($profile, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return new ProfileResource ($profile, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //Log::alert($profile);
        $profile->update([
            'name' => $request->name,
             'email' => $request->email,
            'phone_number' => $request->phone_number,
             'dob' => $request->dob,
             'gender' => $request->gender,
        ]);
        // $profile -> name = $request->name;
        // $profile -> email = $request->email;
        // $profile ->phone_number = $request->phone_number;
        // $profile -> dob = $request->dob;
        // $profile -> gender = $request->gender;
        // $profile->save();

        return new ProfileResource($profile, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->update([
            'is_active' => false,
        ]);

        return new ProfileResource($profile, 200);
    }
}
//0048614266 abraham
