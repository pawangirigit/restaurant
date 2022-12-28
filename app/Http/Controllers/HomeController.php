<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    function index(){
        $data['video']=DB::table('video')->get();
        $data['list']=DB::table('food_item')->get();
        $data['chefs']=DB::table('chefs')->get();

        $data['Breakfast']=DB::table('meal_time')
        ->select('meal_time.*','food_item.item_name')
        ->join('food_item','meal_time.item_id',"=",'food_item.id')
        ->where('meal_time','Breakfast')
        ->get();

        $data['Lunch']=DB::table('meal_time')
        ->select('meal_time.*','food_item.item_name')
        ->join('food_item','meal_time.item_id',"=",'food_item.id')
        ->where('meal_time','Lunch')
        ->get();

        $data['Dinner']=DB::table('meal_time')
        ->select('meal_time.*','food_item.item_name')
        ->join('food_item','meal_time.item_id',"=",'food_item.id')
        ->where('meal_time','Dinner')
        ->get();

        $data['banner']=DB::table('banner')->get();
        return view('home',$data);
    }

    function redirects(){
        $data['list']=DB::table('food_item')->get();
        $data['chefs']=DB::table('chefs')->get();
        $data['video']=DB::table('video')->get();
        $data['Dinner']=DB::table('meal_time')
        ->select('meal_time.*','food_item.item_name')
        ->join('food_item','meal_time.item_id',"=",'food_item.id')
        ->where('meal_time','Dinner')
        ->get();

        $data['Breakfast']=DB::table('meal_time')
        ->select('meal_time.*','food_item.item_name')
        ->join('food_item','meal_time.item_id',"=",'food_item.id')
        ->where('meal_time','Breakfast')
        ->get();

        $data['Lunch']=DB::table('meal_time')
        ->select('meal_time.*','food_item.item_name')
        ->join('food_item','meal_time.item_id',"=",'food_item.id')
        ->where('meal_time','Lunch')
        ->get();
        
        $data['banner']=DB::table('banner')->get();
        
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.adminhome');
        }
        else{
            return view('home',$data);
        }
    }

    function form_upload_video (){
        return view('admin.form_upload_video');
    }

    function post_video(Request $request){

       $request->validate([
        'video'=>'required|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
       ]);

        $video = $request->file('video');
        $destinationPath = public_path('/video');
        $new_name = time().'.'.$video->getClientOriginalExtension();
        $video->move($destinationPath, $new_name);

        DB::table('video')->insert([
            'video'=>$new_name
        ]);
        return redirect()->back()->with('status',"Uploaded Successfully!!");
    }

    function form_upload_banner(){
        return view('admin.form_upload_banner');
    }

    function post_upload_banner(Request $request){

        $request->validate([
            'image'=>'required|mimes:jpeg,jpg,png,gif',
        ]);

        $image = $request->file('image');
        $destinationPath = public_path('/banner');
        $new_name = time().'.'.$image->getClientOriginalExtension();
        $image->move($destinationPath, $new_name);

        DB::table('banner')->insert([
            'image'=>$new_name,
           
        ]);
        return redirect()->back()->with('status',"Uploaded Successfully!!");
    }

    function banner_list(){
        $data['banner']=DB::table('banner')->get();
        return view('admin.banner_list',$data);
    }

    function delete_banner(Request $request){
        DB::table('banner')->where('id',$request->delete)->delete();
        return redirect()->back();
    }
}
