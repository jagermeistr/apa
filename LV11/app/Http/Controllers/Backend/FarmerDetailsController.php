<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FarmerDetails;


class FarmerDetailsController extends Controller
{
    //
    public function AllFarmers(){
        $farmers = FarmerDetails::latest()->get();
        return view('Backend.type.pages.farmers.all_farmers',compact('farmers'));
    }
    public function AddFarmer(){
        return view('Backend.type.pages.farmers.add_farmers');
    }
    public function StoreFarmer(Request $request){
        $request->validate([
            'name' => 'required|unique:farmer_details|max:200',
            'farm' => 'required|string',
            'phone' => 'required|string',
            'weight_collected' => 'required|string',
        ]);
        FarmerDetails::insert([
            'name' => $request ->name,
            'farm' => $request ->farm,
            'phone' => $request ->phone,
            'weight_collected' => $request ->weight_collected,

        ]);

        $notification = array(
            'message'=>'Role Create Successfully',
            'alert-type' => 'success'
        );
           return redirect()->route('all.farmers')->with($notification);
    }
    public function EditFarmer($id){
        $farmers= FarmerDetails::findorFail($id);
        return view('Backend.type.pages.farmers.edit_farmers',compact('farmers'));
    }
    public function UpdateFarmer(Request $request)
    {
        $collections = $request->id;
        FarmerDetails::findorFail($collections)->update([
           
            'name' => $request ->name,
            'farm' => $request ->farm,
            'phone' => $request ->phone,
            'weight_collected' => $request ->weight_collected,
        ]);
        

        $notification = array(
            'message' => 'Farmer Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.farmers')->with($notification);
    }
    public function DeleteFarmer($id){
        FarmerDetails::findorFail($id)->delete();
        $notification = array(
         'message'=>'Farmer Deleted Successfully',
         'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);    
     }

    

}
