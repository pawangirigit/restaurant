<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminController extends Controller
{
    function users(){
        $data['list']=DB::table('users')->orderBy('id', 'DESC')->get();
        $data['title']="Users";
        return view('admin.users',$data);
    }
    
    function delete_user(Request $request){
        DB::table('users')->where('id',$request->delete)->delete();
        return redirect()->back();
    }

    function post_reservation(Request $request){
        $request->validate([
        ]);

        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'guest'=>$request->guest,
            'phone'=>$request->phone,
            'date'=>$request->date,
            'time'=>$request->time,
            'message'=>$request->message,
        ];
        
        DB::table('reservation')->insert($data);
        return redirect()->back();
    }

    function reservation_list(){
        $data['list']=DB::table('reservation')->orderBy('id', 'DESC')->get();
        $data['title']="Reservation List";
        return view('admin.reservation.reservation_list',$data);
    }
}
