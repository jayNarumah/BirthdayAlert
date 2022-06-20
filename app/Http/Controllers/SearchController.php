<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $user = Profile::all();

        $user->where('name', 'like', '%' . $request->search . '%')
             ->orWhere('email', 'like', '%' . $request->search . '%')
             ->orWhere('gender', 'like', '%' . $request->search . '%');

             return response()->json($user, 200);

    }
}
