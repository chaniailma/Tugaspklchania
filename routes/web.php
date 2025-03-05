<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserController;
use App\Http\Controllers\StudentsController;


//Route::get('/', function () {
  //  return view('welcome');
//});
  //  Route::get('/students', function () {
    //    return view('students');
//});

Route::get('/user', [UserController::class, 'index']);
Route::get('/students', [StudentsController::class, 'index']);