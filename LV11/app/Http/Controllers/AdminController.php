<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminController extends Controller
{
    
    public function AdminDashboard(){
        return view('admin.index');
    }
    //end method

    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }

    public function AdminProfile(){
        $id = Auth::user()->id;

        $profileData= User::find($id);

        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data= User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;  
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('photo')){
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();//getClientOriginalName is used to give full detail of an image e.g aria.png
            $file->move(public_path('input/admin_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        return redirect()->back();
        
    }

}

