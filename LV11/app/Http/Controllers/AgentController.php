<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    //
    public function AgentDashboard(){
        return view('agent.index');
    }
    

    public function AgentLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/agent/login');
    }
    public function AgentLogin(){
        return view('agent.agent_login');
    }

    public function AgentProfile(){
        $id = Auth::user()->id;

        $profileData= User::find($id);

        return view('agent.agent_profile_view', compact('profileData'));
    }
    public function AgentProfileStore(Request $request){
        $id = Auth::user()->id;
        $data= User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;  
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('input/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();//getClientOriginalName is used to give full detail of an image e.g aria.png
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
    public function AgentChangePassword(){
        $id = Auth::user()->id;
        $profileData= User::find($id);
        return view('agent.agent_change_password', compact('profileData'));
    }
    public function AgentUpdatePassword(Request $request){
        //validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        //Match the old password
        if(!Hash::check($request->old_password, Auth::user()->password)){
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
}



