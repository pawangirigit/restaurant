<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    function menu(){
        $data['list']=DB::table('menu')->get();
        return view('admin.menu.admin_menu',$data);
    }

    function add_menu (Request $request){
        $data['update']=DB::table('menu')->where('id',$request->update)->first();
        $data['title']=empty($request->update) ? 'Add Menu' : 'Update Menu';
        return view('admin.menu.add_menu',$data);
    }
    
    function post_add_menu(Request $request){
        $request->validate([
            'image'=>'required|mimes:jpeg,jpg,png,gif',
        ]);
        
        $image = $request->file('image');
        $destinationPath = public_path('/foodimage');
        $new_name = time().'.'.$image->getClientOriginalExtension(); 
        $image->move($destinationPath, $new_name);
        
        DB::table('menu')->updateOrInsert(
            [
                'id'=>$request->id
            ],
            [
                'menu'=>$request->menu,
                'image'=>$new_name,
            ]);
       
            return redirect()->back()->with('status',"Data Updated Successfully!!");
        
    }
    
    function delete(Request $request){
        DB::table('menu')->where('id',$request->delete)->delete();
        return redirect()->back()->with('status',"Data Deleted Successfully!!");
      
    }

    /***************************SUB MENU start*********************** */

    function sub_menu(){
        $data['title']="Sub-menu";
        $data['list']=DB::table('sub_menu')
        ->join('menu','sub_menu.menu_id',"=",'menu.id')
        ->get();
        return view('admin.sub_menu.admin_sub_menu',$data);
    }

    function add_sub_menu (Request $request){
        $data['update']=DB::table('sub_menu')->where('id',$request->update)->first();
        $data['title']=empty($request->update) ? 'Add Sub-menu' : 'Update Sub-menu';
        return view('admin.sub_menu.add_sub_menu',$data);
    }

    function post_add_sub_menu(Request $request){
        $request->validate([
            'image'=>'required|mimes:jpeg,jpg,png,gif',
        ]);
        
        $image = $request->file('image');
        $destinationPath = public_path('/foodimage');
        $new_name = time().'.'.$image->getClientOriginalExtension(); 
        $image->move($destinationPath, $new_name);
        
        DB::table('sub_menu')->updateOrInsert(
            [
                'id'=>$request->id
            ],
            [
                'menu_id'=>$request->menu_id,
                'sub_menu'=>$request->sub_menu,
                'image'=>$new_name,
            ]);
            return redirect()->back()->with('status',"Data Updated Successfully!!");
    }

    function sub_menu_delete(Request $request){
        DB::table('sub_menu')->where('id',$request->delete)->delete();
        return redirect()->back()->with('status',"Data Deleted Successfully!!");
      
    }

    /******************************************************   Food Item  **************** */

    function food_item(){
        $data['title']="Food items";
        $data['list']=DB::table('food_item')
        ->orderBy('id', 'DESC')
        ->select('food_item.*','menu.menu','sub_menu.sub_menu')
        ->join('menu','food_item.menu_id',"=",'menu.id')
        ->join('sub_menu','food_item.sub_menu_id',"=",'sub_menu.id')
        ->get();
        return view('admin.food_item.food_item_list',$data);
    }

    function form_food_item(Request $request){
        $data['update']=DB::table('food_item')->where('id',$request->update)->first();
        $data['title']=empty($request->update) ? 'Add Food item' : 'Update Food item';
        return view('admin.food_item.form_food_item',$data);
    }

    function ajax_getsubmenu(Request $request){
        $data = DB::table("sub_menu")->select('sub_menu','id')->where("menu_id",$request->mid)->get();
        $res = '';
        foreach($data as $v1){
            $res .= "<option value='".$v1->id."'>".$v1->sub_menu."</option>";
        }
        if(empty($res)){
            $res = "<option value=''>-- Data Not Available --</option>";
        }
        return $res;
    }

    function post_food_item(Request $request){

        $request->validate([
            'image'=>'required|mimes:jpeg,jpg,png,gif',
            'sub_menu_id'=>'required',
            'menu_id'=>'required',
            'item_name'=>'required',
           
        ]);

        $image = $request->file('image');
        $destinationPath = public_path('/foodimage');
        $new_name = time().'.'.$image->getClientOriginalExtension(); 
        $image->move($destinationPath, $new_name);
       
        DB::table('food_item')->updateOrInsert(
            [
                'id'=>$request->id
            ],
            [
                'sub_menu_id'=>$request->sub_menu_id,
                'menu_id'=>$request->menu_id,
                'item_name'=>$request->item_name,
                'price'=>$request->price,
                'description'=>$request->description,
                'image'=>$new_name,
            ]);
        return redirect()->back()->with('status',"Data Updated Successfully!!");
    }

    function item_delete(Request $request){
        DB::table('food_item')->where('id',$request->delete)->delete();
        return redirect()->back();
    }

    function form_meal_time(){
        return view('admin.food_item.form_meal_time');
    }

    function ajax_getitem(Request $request){
        $data = DB::table("food_item")->select('item_name','id')->where("sub_menu_id",$request->mid)->get();
        $res = '';
        foreach($data as $v1){
            $res .= "<option value='".$v1->id."'>".$v1->item_name."</option>";
        }
        if(empty($res)){
            $res = "<option value=''>-- Data Not Available --</option>";
        }
        return $res;
    }

    function post_meal_time(Request $request){
        $image = $request->file('image');
        $destinationPath = public_path('/foodimage');
        $new_name = time().'.'.$image->getClientOriginalExtension(); 
        $image->move($destinationPath, $new_name);

        DB::table('meal_time')->insert([
            'menu_id'=>$request->menu_id,
            'sub_menu_id'=>$request->sub_menu_id,
            'item_id'=>$request->item_id,
            'meal_time'=>$request->meal_time,
            'price'=>$request->price,
            'description'=>$request->description,
            'description'=>$new_name,
        ]);
        return redirect()->back();
    }
    function meal_time_list(){
        
        $data['list']=DB::table('meal_time')
        ->select('meal_time.*','menu.menu','sub_menu.sub_menu','food_item.item_name')
        ->join('menu','meal_time.menu_id',"=",'menu.id')
        ->join('sub_menu','meal_time.sub_menu_id',"=",'sub_menu.id')
        ->join('food_item','meal_time.item_id',"=",'food_item.id')
        ->get();
        return view('admin.food_item.meal_time_list',$data);
    }
}
