<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


// Route::get();
// Route::post();
// Route::put();
// Route::patch(); partial edit
// Route::delete();
// Route::option(); allowed specific json content


// Route::get('/users', [UserController::class, 'index']);
// Route::get('/user/{id}', [UserController::class, 'show']);
// Route::get('/students', [StudentController::class, 'index']);
// Route::get('/', [ProductController::class, 'index']);
// Route::get('/products', [ProductController::class, 'index']);

//Common routes naming
//index - Show all data or students
//show - Show a single data or student
//create - Show a form to add a new user
//store - Store data
//edit - Show form to edit data
//update - update data
//destroy - delete data

Route::get('/', [StudentController::class, 'index'])->middleware('auth');
Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login/process', [UserController::class, 'process']);
Route::post('/logout', [UserController::class, 'logout']);


Route::post('/store', [UserController::class, 'store']);
Route::get('/add/student', [StudentController::class, 'create']);
Route::post('/add/student', [StudentController::class, 'store']);

Route::get('/student/{id}', [StudentController::class, 'show']);
Route::put('/student/{id}', [StudentController::class, 'update']);


