<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    //
    public function AllType(){
        $types=PropertyType::latest()->get();
        return view('admin.backend.types.all_type',compact('types'));
    }// end method

    public function AddType(){
        return view('admin.backend.types.add_type');
    }

    public function StoreType(Request $request){
        $request->validate([
            'type_name'=>'required|unique:property_types',
            'type_icon'=>'required'
        ]);
        PropertyType::insert([
            'type_name'=>$request->type_name,
            'type_icon'=>$request->type_icon
        ]);
        $notification=array(
            'message'=>'property  type  created succefully!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.type')->with($notification);
    }// end method
    public function EditType($id){
        $types=PropertyType::findorFail($id);
        return view('admin.backend.types.edit_type',compact('types'));
    }//end method
    

    public function UpdateType(Request $request){
       $pid=$request->id;
        PropertyType::findOrFail($pid)->update([
            'type_name'=>$request->type_name,
            'type_icon'=>$request->type_icon
        ]);
        $notification=array(
            'message'=>'property  type  updated succefully!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.type')->with($notification);
    }// end method
    public function DeleteType($id){
        PropertyType::findOrFail($id)->delete();
        $notification=array(
            'message'=>'property  type  deleted succefully!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.type')->with($notification);

    }// end method
    ///////////all amenties methods////////////////
    public function AllAmenties(){
        $ameneties=Amenities::latest()->get();
        return view('admin.backend.ameneties.all_ameneties',compact('ameneties'));
   
    }
    public function AddAmenties(){
        return view('admin.backend.ameneties.add_ameneties');
    }// end method

    public function StoreAmenties(Request $request){
      
        Amenities::insert([
            'ameneties_name'=>$request->ameneties_name
            
        ]);
        $notification=array(
            'message'=>'Amenties  created succefully!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.ameneties')->with($notification);
    }// end method

    public function EditAmenties($id){
        $amenties=Amenities::findorFail($id);
        return view('admin.backend.ameneties.edit_amenties',compact('amenties'));
    }//end method 
    public function UpdateAmeneties(Request $request){
        $amen_id=$request->id;
         Amenities::findOrFail($amen_id)->update([
             'ameneties_name'=>$request->ameneties_name,
            
         ]);
         $notification=array(
             'message'=>'Amenties updated succefully!',
             'alert-type'=>'success'
         );
         return redirect()->route('all.ameneties')->with($notification);
     }// end method

     public function DeleteAmenties($id){
        Amenities::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Ameneties    deleted succefully!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.ameneties')->with($notification);

    }// end method
}
