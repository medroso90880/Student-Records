<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuidanceController;
use App\Http\Controllers\RegistrarController;

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
Route::group(['middleware' => 'prevent-back-history'],function(){
//login or create options
Route::get('/',[UserController::class, 'signin'])->middleware('prevent-back-history');
//show login form

Route::get('/login',[UserController::class, 'login'])->middleware('guest');

//create user form 
Route::get('/register',[UserController::class, 'register'])->middleware('guest');

//create new user 
Route::post('/store_user',[UserController::class, 'store']);

//logout user
Route::post('/logout',[UserController::class, 'logout']);

//logout form
Route::get('/logout-form',[UserController::class, 'logoutform']);

//admin home page
Route::get('/admin-home',[AdminController::class, 'dashboard'])->middleware('admin','prevent-back-history');

//student home page
Route::get('/student-home',[StudentController::class, 'dashboard'])->middleware('student');

//guidance home page
Route::get('/guidance-home',[GuidanceController::class, 'dashboard'])->middleware('guidance');

//registrar home page
Route::get('/registrar-home',[RegistrarController::class, 'dashboard'])->middleware('registrar');

//do home page
Route::get('/decipline-officer-home',[DoController::class, 'dashboard'])->middleware('do');

//authenticate user
Route::post('user/authenticate',[UserController::class, 'authenticate']);

//google authenticate
Route::get('/auth/google/redirect', [AuthController::class, 'googleredirect'])->name('googlelogin');
Route::get('/auth/google/callback', [AuthController::class, 'googlecallback']);

Route::get('/sample', [UserContoller::class, 'sample']);

});