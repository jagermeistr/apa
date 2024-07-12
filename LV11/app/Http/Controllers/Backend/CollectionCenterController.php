<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CollectionCentre;


class CollectionCenterController extends Controller
{
    //
    public function AllCollections()
    {
        $collections = CollectionCentre::latest()->get();;
        return view('Backend.type.pages.Collection_center.all_collection_center', compact('collections'));
    }
    public function AddCollections()
    {
        return view('Backend.type.pages.Collection_center.add_collection_center');
    }
    public function StoreCollections(Request $request)
    {
        $request->validate([
            'collection_centres' => 'required|unique:collection_centres|max:200',
            'collection_centre_address' => 'required|string',
        ]);

        CollectionCentre::insert([
            'collection_centres' => $request->collection_centres,
            'collection_centre_address' => $request->collection_centre_address,
        ]);

        $notification = array(
            'message' => 'Collection Center Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.collections')->with($notification);
    }
    public function EditCollections($id)
    {
        $collections = CollectionCentre::findorFail($id);
        return view('Backend.type.pages.Collection_center.edit_collection_center', compact('collections'));
    }
    public function updateCollections(Request $request)
    {
        $collections = $request->id;

        CollectionCentre::findorFail($collections)->update([
            'collection_centres' => $request->input('collection_centres'),
            'collection_centre_address' => $request->input('collection_centre_address'),
        ]);

        $notification = array(
            'message'=>'Role Create Successfully',
            'alert-type' => 'success'
        );
           return redirect()->route('all.collections')->with($notification);
    
    }

    public function DeleteCollections($id)
    {
        CollectionCentre::findorFail($id)->delete();
        $notification = array(
            'message' => 'Farmer Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
