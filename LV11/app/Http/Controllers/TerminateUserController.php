<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\AdminTerminationRequestNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\TerminationRequest;
use App\Models\User;




class TerminateUserController extends Controller
{
    //
    public function showUserProfile()
    {
        $user = auth()->user(); // or retrieve the user from the database
        return view('user-profile', compact('user'));
    }
    public function requestTermination(Request $request)
    {
        // Get the admin user
        $admin = User::find(1); // Replace with the actual admin user ID

        // Create a new notification instance
        $notification = new AdminTerminationRequestNotification();

        // Send the notification to the admin
        Notification::send($admin, $notification);

        // Redirect back to the user profile page with a success message
        return redirect()->back()->with('success', 'Termination request sent to admin!');
    }
}
