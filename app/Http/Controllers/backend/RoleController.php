<?php

namespace App\Http\Controllers\backend;

use App\Exports\PermissionExport;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    //
    public function AllPermissions(){
        $permissions=Permission::all();
        return view('admin.backend.pages.permissions.all_permissions',compact('permissions'));
    }//end method
    public function AddPermissions(){
        return view('admin.backend.pages.permissions.add_permissions');
    }// end method StorePermissions
    public function StorePermissions(Request $request){
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification=array(
            'message'=>'Permission created succefully!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.Permissions')->with($notification);
    }//end method
    public function EditPermissions($id){
        $permission=Permission::findOrFail($id);
        return view('admin.backend.pages.permissions.edit_permissions',compact('permission'));
    }// end method
    public function UpdatePermissions(Request $request){
        $per_id=$request->id;
          Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification=array(
            'message'=>'Permission updated succefully!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.Permissions')->with($notification);
  

    }// end method
    public function DeletePermissions($id){
        Permission::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Permission deleted succefully!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.Permissions')->with($notification);
  
    }// end method
    public function ImportPermissions(){
        return view('admin.backend.pages.permissions.import_permission');
    }// end method
    public function Export(){
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }// end method
    public function Import(Request $request){
        Excel::import(new PermissionImport, $request->file('import_file'));
        $notification=array(
            'message'=>'Permission imported succefully!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.Permissions')->with($notification);
  
    }// end method

    // All roles method//////////////
    public function AllRoles(){
        $roles=Role::all();
        return view('admin.backend.pages.roles.all_roles',compact('roles'));
    }// end method
    public function AddRoles(){
        return view('admin.backend.pages.roles.add_roles');
    }// end method
    public function StoreRoles(Request $request){
        $role = Role::create([
            'name' => $request->name,
           
        ]);
        $notification=array(
            'message'=>'Role created succefully!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }// end method
    public function EditRoles($id){
        $roles=Role::findOrFail($id);
        return view('admin.backend.pages.roles.edit_role',compact('roles'));
    }// end method
    public function UpdateRoles(Request $request){
        $rol_id=$request->id;
        Role::findOrFail($rol_id)->update([
          'name' => $request->name,
          
      ]);
      $notification=array(
          'message'=>'Role updated succefully!',
          'alert-type'=>'success'
      );
      return redirect()->route('all.roles')->with($notification);

    }// end method
    public function DeleteRoles($id){
        Role::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Role deleted succefully!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.roles')->with($notification);
  
    }// end method
    /////All add roles permissions method////////////
    public function AddRolesPermissions(){
        $roles=Role::all();
        $permissions=Permission::all();
        $permission_group=User::GetPermissionGroup();
        return view('admin.backend.pages.rolesetup.add_role_permission',
        compact('roles','permissions','permission_group'));
    }// end method
    public function StoreRolesPermissions(Request $request){
        $data=array();
        $permissions=$request->permission;
        foreach($permissions as $key=>$item){
            $data['role_id']=$request->role_id;
            $data['permission_id']=$item;
            DB::table('role_has_permissions')->insert($data);
        }// end foreach
        $notification=array(
            'message'=>'Role Permission added succefully!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.roles.permissions')->with($notification);
  
    }// end methgod
    public function AllRolesPermissions(){
        $roles=Role::all();
        return view('admin.backend.pages.rolesetup.all_role_permissions',compact('roles'));
    }// end method

    public function AdminEditRoles($id){
        $role=Role::findOrFail($id);
        $permissions=Permission::all();
        $permission_group=User::GetPermissionGroup();
        return view('admin.backend.pages.rolesetup.admin_edit_role',
        compact('role','permissions','permission_group'));

    }// end method
    public function AdminUpdateRoles(Request $request,$id){
        $role=Role::findOrFail($id);
        $permissions=$request->permission;
        
        if(!empty($permissions)){
            $role->givePermissionTo($permissions);
            $permissions->assignRole($role);
            $role->syncPermissions($permissions);
            $permissions->syncRoles($role);
           
           
        }
        $notification=array(
            'message'=>'Role Permission Updated succefully!',
            'alert-type'=>'success'
        );
        
        return redirect()->route('all.roles.permissions')->with($notification);
  
    }
}