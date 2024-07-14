<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;

class RoleController extends Controller
{
    //Permission controllers
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view('Backend.type.pages.permission.all_permissions', compact('permissions'));
    }
    public function AddPermission()
    {
        return view('Backend.type.pages.permission.add_permissions');
    }
    public function StorePermission(Request $request)
    {
        $permission = Permission::where('name', $request->name)->first();

    if ($permission) {
        $notification = array(
            'message' => 'Permission already exists',
            'alert-type' => 'error'
        );
        return redirect()->route('all.permissions')->with($notification);
    }else
        $permissions = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permissions')->with($notification);
    }
    public function EditPermission($id)
    {
        $permission = Permission::findorFail($id);
        return view('Backend.type.pages.permission.edit_permissions', compact('permission'));
    }
    public function UpdatePermission(Request $request, $id)
    {
        $per_id = $request->id;
        Permission::findorFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permissions')->with($notification);
    }
    public function DeletePermission($id)
    {
        Permission::findorFail($id)->delete();
        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ImportPermission()
    {
        return view('Backend.type.pages.permission.import_permissions');
    }
    public function Export()
    {
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }
    public function import(Request $request)
    {
        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //roles Controllers
    public function AllRoles()
    {
        $roles = Role::all();
        return view('Backend.type.pages.roles.all_roles', compact('roles'));
    }
    public function AddRoles()
    {
        return view('Backend.type.pages.roles.add_roles');
    }
    public function StoreRoles(Request $request)
    {
        Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }
    public function EditRoles($id)
    {
        $roles = Role::findorFail($id);
        return view('Backend.type.pages.roles.edit_roles', compact('roles'));
    }
    public function UpdateRoles(Request $request)
    {
        $role_id = $request->id;
        Role::findorFail($role_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);

    }
    public function DeleteRoles($id)
    {
        Role::findorFail($id)->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    //  ROLES PERMISSION SECTION

    public function AddRolesPermission()
    {

        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('Backend.type.pages.rolesetup.add_roles_permission', compact('roles', 'permissions', 'permission_groups'));
    }

    public function StoreRolesPermission(Request $request)
    {
        $data = array();
        $permissions = $request->permission;
        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }
        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }
    public function AllRolesPermission()
    {
        $roles = Role::all();
        return view('Backend.type.pages.rolesetup.all_roles_permission', compact('roles'));
    }


    public function AdminEditRoles($id){
        $role = Role::findorFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('Backend.type.pages.rolesetup.edit_roles_permission', compact('role', 'permissions', 'permission_groups'));
    }
    public function AdminRolesUpdate(Request $request)
    {
        $role_id = $request->id;
        $role= Role::findorFail($role_id);
        $permissions=$request->permission;
        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Role Permissions Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
        
    }
    public function AdminRolesDelete($id){
        $role = Role::findorFail($id);
        if(!is_null($role)){
        $role->delete();
        }
        $notification = array(
            'message' => 'Role Permissions Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
        
    }
}
