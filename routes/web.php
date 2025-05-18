<?php

use App\Http\Controllers\AdminController\AdminCar_controller;
use App\Http\Controllers\CustomerController\CarController;
use App\Http\Controllers\CustomerController\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\UserCheck;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'Homepage'])->name('user.homepage');
Route::get('/ragistrationpage',[HomeController::class,'Registrationpage'])->name('registration.page');
Route::get('/login',[HomeController::class,'Loginpage'])->name('login.page');
Route::post('/createprofile',[UserController::class,'ProfileCreate']);
Route::post('/profilelogin',[UserController::class,'Login']);
Route::get('/userhomepage',[UserController::class,'UserHomepage'])->name('user.homePage');
Route::get('/userdashpage',[UserController::class,'UserdashPage'])->name('user.dashpage')->middleware('auth');
Route::get('/userrental',[UserController::class,'UserRental']);
Route::post('/carbook',[UserController::class,'carbooking']);

 Route::get('/admindashpage',[AdminCar_controller::class,'Admindashboard'])->name('admin.dash')->middleware([UserCheck::class,'auth']);


Route::get('/car-createpage',[AdminCar_controller::class,'Car_create_page']);
Route::get('/admincarpage',[AdminCar_controller::class,'admin_carpage']);
Route::post('/car-store',[AdminCar_controller::class,'Car_store']);

Route::get('/car-details/{id}',[CarController::class,'CarDetails']);
Route::get('/car-feature',[CarController::class,'CarFeature']);
Route::get('/popcard',[CarController::class,'popcard']);

