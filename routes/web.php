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


Route::controller(UserController::class)->group(function(){
    Route::get('/register','register');
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login/process', 'process');
    Route::post('/logout','logout');
    Route::post('/store','store');
});

Route::controller(StudentController::class)->group(function(){
    Route::get('/','index')->middleware('auth');
    Route::get('/add/student','create')->name('create student');
    Route::post('/add/student','store')->name('store student');
    Route::get('/student/{student}/show','show')->name('student.show');
    Route::get('/student/{student}/edit','edit')->name('student.edit');
    Route::put('/student/{student}/update','update')->name('student.update');
    Route::delete('/student/{student}','destroy')->name('student.destroy');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/product', 'index')->name('product.index');
    Route::get('/product/create', 'create')->name('product.create');
    Route::post('/product','store')->name('product.store');
    Route::get('/product/{product}/edit','edit')->name('product.edit');
    Route::put('/product/{product}/update','update')->name('product.update');
});




