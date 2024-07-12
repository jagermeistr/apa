<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PluckerDetails;


class PluckerDetailsController extends Controller
{
    //
    public function AllPluckers(){
        $pluckers = PluckerDetails::latest()->get();;
        return view('Backend.type.pages.pluckers.all_pluckers',compact('pluckers'));
    }
    public function AddPlucker(){
        return view('Backend.type.pages.pluckers.add_pluckers');
    }
    public function StorePlucker(Request $request){
        $request->validate([
            'name' => 'required|unique:plucker_details|max:200',
            'farm' => 'required',
            'phone' => 'required',
            'weight_collected' => 'required',
        ]);
        PluckerDetails::create([
            'name' => $request ->name,
            'farm' => $request ->farm,
            'phone' => $request ->phone,
            'weight_collected' => $request ->weight_collected,

        ]);

        $notification = array(
            'message'=>'Role Create Successfully',
            'alert-type' => 'success'
        );
           return redirect()->route('all.pluckers')->with($notification);
    }
    public function EditPlucker($id){
        $pluckers= PluckerDetails::findorFail($id);
        return view('Backend.type.pages.pluckers.edit_pluckers',compact('pluckers'));
    }
    public function UpdatePlucker(Request $request)
    {
        $pluckers = $request->id;
        PluckerDetails::findorFail($pluckers)->update([
            'name' => $request ->name,
            'farm' => $request ->farm,
            'phone' => $request ->phone,
            'weight_collected' => $request ->weight_collected,
        ]);

        $notification = array(
            'message' => 'Farmer Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.pluckers')->with($notification);
    }
    public function DeletePlucker($id){
        PluckerDetails::findorFail($id)->delete();
        $notification = array(
         'message'=>'Plucker Deleted Successfully',
         'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);    
     }

    

}
