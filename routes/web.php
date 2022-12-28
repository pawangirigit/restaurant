<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\FoodController;
use App\Http\Controllers\admin\ChefsController;
use App\Http\Controllers\admin\MenuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/',[HomeController::class,'index']);
Route::get('/redirects',[HomeController::class,'redirects'])->name('redirects');


//Home
Route::get('/form_upload_video',[HomeController::class,'form_upload_video'])->name("form_upload_video");
Route::post('/post_video',[HomeController::class,'post_video'])->name("post_video");
Route::get('/form_upload_banner',[HomeController::class,'form_upload_banner'])->name("form_upload_banner");
Route::post('/post_upload_banner',[HomeController::class,'post_upload_banner'])->name("post_upload_banner");
Route::get('/banner_list',[HomeController::class,'banner_list'])->name("banner_list");
Route::get('/delete_banner',[HomeController::class,'delete_banner'])->name("delete_banner");


//User
Route::get('/users',[AdminController::class,'users'])->name("users");
Route::get('/delete_user',[AdminController::class,'delete_user'])->name("delete_user");


//Menu
Route::get('/menu',[FoodController::class,'menu'])->name("menu");
Route::get('/add_menu',[FoodController::class,'add_menu'])->name("add_menu");
Route::post('/post_add_menu',[FoodController::class,'post_add_menu'])->name("post_add_menu");
Route::get('/delete',[FoodController::class,'delete'])->name("delete");


//Sub-Menu
Route::get('/sub_menu',[FoodController::class,'sub_menu'])->name("sub_menu");
Route::get('/add_sub_menu',[FoodController::class,'add_sub_menu'])->name("add_sub_menu");
Route::post('/post_add_sub_menu',[FoodController::class,'post_add_sub_menu'])->name("post_add_sub_menu");
Route::get('/sub_menu_delete',[FoodController::class,'sub_menu_delete'])->name("sub_menu_delete");


//food item

Route::get('/food_item',[FoodController::class,'food_item'])->name("food_item");
Route::get('/form_food_item',[FoodController::class,'form_food_item'])->name("form_food_item");
Route::post('/post_food_item',[FoodController::class,'post_food_item'])->name("post_food_item");
Route::get('/item_delete',[FoodController::class,'item_delete'])->name("item_delete");

//Meal Time
Route::post("ajax_getsubmenu",[FoodController::class,'ajax_getsubmenu'])->name('ajax_getsubmenu');
Route::get('/form_meal_time',[FoodController::class,'form_meal_time'])->name("form_meal_time");
Route::post("ajax_getitem",[FoodController::class,'ajax_getitem'])->name('ajax_getitem');
Route::post("post_meal_time",[FoodController::class,'post_meal_time'])->name("post_meal_time");
Route::get("meal_time_list",[FoodController::class,'meal_time_list'])->name("meal_time_list");



//reservation
Route::post('/post_reservation',[AdminController::class,'post_reservation'])->name("post_reservation");
Route::get('/reservation_list',[AdminController::class,'reservation_list'])->name("reservation_list");

//chefs
Route::get('/chefs',[ChefsController::class,'chefs'])->name("chefs");
Route::get('/form_add_chefs',[ChefsController::class,'form_add_chefs'])->name("form_add_chefs");
Route::post('/post_add_chefs',[ChefsController::class,'post_add_chefs'])->name("post_add_chefs");


//





