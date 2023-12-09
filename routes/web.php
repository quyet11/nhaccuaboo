<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
route::get('/',[HomeController::Class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/redirect',[HomeController::Class,'redirect']);
route::get('/view_catagory',[AdminController::Class,'view_catagory']);

route::post('/add_catagory',[AdminController::Class,'add_catagory']);

route::get('/delete_catagory/{id}',[AdminController::Class,'delete_catagory']);
route::get('/view_music',[AdminController::Class,'view_music']);
route::post('/add_music',[AdminController::Class,'add_music']);
route::get('/show_music',[AdminController::Class,'show_music']);
route::get('/delete_music/{id}',[AdminController::Class,'delete_music']);
route::get('/update_music/{id}',[AdminController::Class,'update_music']);
route::post('/update_music_confirm/{id}',[AdminController::Class,'update_music_confirm']);
route::get('/listen/{id}',[HomeController::Class,'listen']);
route::get('/search',[AdminController::Class,'search']);




