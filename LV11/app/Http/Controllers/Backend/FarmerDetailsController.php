<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FarmerDetails;


class FarmerDetailsController extends Controller
{
    //
    public function AllFarmers(){
        $farmers = FarmerDetails::all();
        return view('Backend.type.pages.farmers.all_farmers',compact('farmers'));
    }
    public function AddFarmer(){
        return view('Backend.type.pages.farmers.add_farmers');
    }
    public function StoreFarmer(Request $request){
        FarmerDetails::create([
            'name' => $request ->name,
            'farm' => $request ->farm,
            'phone' => $request ->phone,
            'weight_collected' => $request ->weight_collected,

        ]);

        $notification = array(
            'message'=>'Role Create Successfully',
            'alert-type' => 'success'
        );
           return redirect()->route('all.roles')->with($notification);
    }
    public function EditFarmer($id){
        $farmers= FarmerDetails::findorFail($id);
        return view('Backend.type.pages.farmers.edit_farmers',compact('farmers'));
    }
    public function UpdateFarmer(Request $request, $id)
    {
        $farmer_id = $request->id;
        FarmerDetails::findorFail($farmer_id)->update([
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
