<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
//login or create options
Route::get('/',[UserController::class, 'signin']);
//show login form

Route::get('/login',[UserController::class, 'login']);

//create user form 
Route::get('/register',[UserController::class, 'register']);

//create new user 
Route::post('/store_user',[UserController::class, 'store']);

//logout user
Route::post('/logout',[UserController::class, 'logout']);

//show home view 
Route::get('/home',[Controller::class, 'home']);

//admin home page
Route::get('/admin',[Controller::class, 'admin']);

//authenticate user
Route::post('user/authenticate',[UserController::class, 'authenticate']);

