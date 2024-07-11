<?php

namespace App\Http\Controllers;

use App\Models\CollectionCentre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function AdminDashboard()
    {
        return view('admin.index');
    }
    //end method
    public function AdminPayment()
    {
        return view('admin.admin_payment');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }
    public function AdminWeight()
    {
        return view('admin.admin_weight');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;

        $profileData = User::find($id);

        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('input/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName(); //getClientOriginalName is used to give full detail of an image e.g aria.png
            $file->move(public_path('input/admin_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }
    public function AdminUpdatePassword(Request $request)
    {
        //validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        //Match the old password
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            $notification = array(
                'message' => 'Old Password Does Not Match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        //Update the new password

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        $notification = array(
            'message' => 'Password Changed Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function showUserProfile(User $user)
    {
        return view('admin.user-profile', ['user' => $user]);
    }
    
    public function index()
    {
        $userCount = User::count();
        return view('admin.dashboard', compact('userCount'));
    }
    public function CollectionCentre()
    {
        $CollectionCount = CollectionCentre::count();
        return view('admin.dashboard', compact('CollectionCount'));
    }
}
