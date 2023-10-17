<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/',[UserController::class,'home']);
Route::get('/register',[UserController::class,'register']);
Route::post('/register',[UserController::class,'registerpost']);
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'loginpost']);
Route::get('/forgot',[UserController::class,'forgot']);
Route::post('/forgot',[UserController::class,'forgotpost']);
Route::get('/reset/{token}',[UserController::class,'reset'])->name('reset');
Route::put('/resetpost/{token}',[UserController::class,'resetpost'])->name('resetpost');
Route::get('/logout',[UserController::class,'logout']);

Route::group(['middleware'=>'auth'],function(){
Route::get('/dashboard',[UserController::class,'dashboard']);
Route::get('/book/{id}',[UserController::class,'book']);
Route::get('/approve/{id}',[UserController::class,'approve']);
Route::post('/approve/{id}',[UserController::class,'approvepost']);
Route::post('/book',[UserController::class,'bookpost']);
Route::get('/update/{id}',[UserController::class,'update']);
Route::get('/lab/{id}',[UserController::class,'lab']);
Route::post('/lab/{id}',[UserController::class,'labpost']);
Route::put('/update/{id}',[UserController::class,'updatepost']);
Route::get('/add',[UserController::class,'add']);
Route::post('/add',[UserController::class,'addpost']);
Route::get('/delete/{id}',[UserController::class,'delete']);
Route::get('/profile',[UserController::class,'profile']);
Route::post('/profile',[UserController::class,'profilepost']);
});