<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Group;
use \Illuminate\Support\Facades\Log;

class GroupController extends Controller
{
    function index()
    {
        $groups = Group::where('is_active', true)->get();

        $groups = $groups->user()->profile;

        return response()->json( $groups, 201);
    }

    function count()
    {
        $groups = Group::where('is_active', true)->count();

        return response()->json($groups, 201);
    }

    function store(Request $request)
    {
        $rules=$request->validate([
            'group_name' => 'required|min:3|max:250',
            'admin_id' => 'required|min:1'
        ]);

        $group = Group::create($rules);
        return response()->json($group, 201);

    }

    function show(Request $request)
    {
        $id = $request->id;
        $group = Group::findOrFail($id);

        return response()->json($group->load('user'), 201);
    }

    function update(Request $request)
    {
        $id = $request->id;
        $grp = Group::findOrFail($id);

       // $grp->update( ['is_active' => false]);
        $grp->is_active = false;
        $grp->save();

        return response()->json($grp, 201);

    }
}
