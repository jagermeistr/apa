<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AgentUserController extends Controller
{
    //
    public function AgentUserSearch(Request $request)
    {
        $nationalId = $request->input('national_id');
        $user = User::where('national_id', $nationalId)->first();

        if ($user) {
            // Define the $profileData variable
            $profileData = $user; 

            // Return the user's information
            return view('agent.agent_update', compact('profileData'));
        } else {
            // Return an error message if the user is not found
            return back();
        }
    }
    public function AgentUserUpdate(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);

        if ($user) {
            $profileData = $user; 
            $user->farm = $request->input('farm');
            $user->weight_collected = $request->input('weight_collected');
            $user->save();
            return view('agent.index', compact('profileData'));
        } else {
            // Return an error message if the user is not found
            return back();
        }
    }
}


