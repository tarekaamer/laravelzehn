<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }// end method 
    
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
    public function AdminLogin(){
        return view('admin.admin_login');
    }// end method
    public function AdminProfile(){
        $id=Auth::user()->id;
        $adminData=User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }// end method
    public function AdminProfileStore(Request $request){
        $id=Auth::user()->id;
        $data=User::find($id);
        $data->username=$request->username;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->address=$request->address;
        if($request->file('photo')){
            $file=$request->file('photo');
            @unlink(public_path('uploads/admin_images/'.$data->photo));
            $fileName=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images'),$fileName);
            $data['photo']=$fileName;

        }

        $data->save();
        
        $notifications=array(
            'message'=>'Admin Profile Updated Succefully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notifications);
    }// end method

    public function AdminChangePswd(){
        $id=Auth::user()->id;
        $adminData=User::find($id);
        return view('admin.admin_change_password',compact('adminData'));
    }// end method

    public function AdminUpdatPswd(Request $request){
        //validation
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required'
        ]);
        // match the old password
        if(!Hash::check($request->old_password,auth::user()->password)){
            $notification=array(
                'message'=>'old  password Does not match!',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }
        // update the new password
        User::whereId(auth()->user()->id)->update([
            'password'=>Hash::make($request->new_password)
        ]);
        $notification=array(
            'message'=>'new  password  changed succefully!',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
