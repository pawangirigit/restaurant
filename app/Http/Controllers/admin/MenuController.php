<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class MenuController extends Controller
{
    public function menu(){
        return view('admin.menus.menu_list');
    }

    public function menu_list(){
        $data= Menu::all();
        return response()->json($data);
    }

    function form_menu(){
        return view('admin.menus.form_menu');
    }

    public function store(Request $request){
       
        $data=DB::table('menus')->insert([
            'menu'=>$request->menu,
        ]);
        return response()->json($data);
    }
}

