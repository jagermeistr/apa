<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    //
    public function AllPermission(){
        $permissions = Permission::all();
        return view('Backend.type.pages.permission.all_permissions',compact('permissions'));
    }
    public function AddPermission(){
        return view('Backend.type.pages.permission.add_permissions');
    }
    public function StorePermission(Request $request){
        $permission = Permission::create([
            'name' => $request ->name,
            'group_name' => $request ->group_name,
        ]);

        $notification = array(
            'message'=>'Permission Create Successfully',
            'alert-type' => 'success'
        );
           return redirect()->route('all.permissions')->with($notification);
    }
    public function EditPermission($id){
        $permission= Permission::findorFail($id);
        return view('Backend.type.pages.permission.edit_permissions',compact('permission'));
    }
}
