<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CollectionCentre;


class CollectionCenterController extends Controller
{
    //
    public function AllCollection(){
        $collections = CollectionCentre::all();
        return view('Backend.type.pages.Collection_center.all_collection_center',compact('collections'));
    }
    public function AddCollection(){
        return view('Backend.type.pages.Collection_center.add_collection_center');
    }
    public function StoreCollection(Request $request){
        CollectionCentre::create([
            'collection_centres' => $request ->collection_centres,
            'collection_centre_address' => $request ->collection_centre_address,
            
            

        ]);

        $notification = array(
            'message'=>'Role Create Successfully',
            'alert-type' => 'success'
        );
           return redirect()->route('all.roles')->with($notification);
    }
    public function EditCollection($id){
        $collections= CollectionCentre::findorFail($id);
        return view('Backend.type.pages.Collection_center.all_collection_center',compact('collections'));
    }
    public function UpdateCollection(Request $request, $id)
    {
        $collection_id = $request->id;
        CollectionCentre::findorFail($collection_id)->update([
           'collection_centres' => $request ->collection_centres,
            'collection_centre_address' => $request ->collection_centre_address,
        ]);

        $notification = array(
            'message' => 'Farmer Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.collection.center')->with($notification);
    }
    public function DeleteCollection($id){
        CollectionCentre::findorFail($id)->delete();
        $notification = array(
         'message'=>'Farmer Deleted Successfully',
         'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);    
     }

}
