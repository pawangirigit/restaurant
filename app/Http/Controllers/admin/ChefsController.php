<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChefsController extends Controller
{
    function chefs(){
        $data['title']="Chefs";
        $data['list']=DB::table('chefs')->get();
        return view('admin.chefs.chefs',$data);
    }
    function form_add_chefs(Request $request){
        $data['update']=DB::table('chefs')->where('id',$request->update)->first();
        $data['title']=empty($request->update) ? 'Add Chefs' : 'Update Chefs';
        return view('admin.chefs.form_add_chefs',$data);
    }

    function post_add_chefs(Request $request){
        $request->validate([
            'image'=>'required|mimes:jpeg,jpg,png,gif',
        ]);
        $image = $request->file('image');
        $destinationPath = public_path('/chefsimage');
        $new_name = time().'.'.$image->getClientOriginalExtension(); 
        $image->move($destinationPath, $new_name);

        DB::table('chefs')->updateOrInsert(
            [
                'id'=>$request->id
            ],
            [
                'name'=>$request->name,
                'menu'=>$request->menu,
                'sallery'=>$request->sallery,
                'joining_date'=>$request->joining_date,
                'address'=>$request->address,
                'contact_no'=>$request->contact_no,
                'email'=>$request->email,
                'aadhar'=>$request->aadhar,
                'image'=>$new_name,
            ]);
            return redirect()->back();
    }
}
