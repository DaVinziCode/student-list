<?php

use App\Http\Controllers\IndexController;
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

Route::match(['get', 'post'], '/', function () {
    return 'POST and GET is allowed';
}); //may filtering

Route::any("/", function () {
    return 'welcome';
}); // walang filter

Route::view("/welcome", "welcome"); //for viewing purposes

// Route::get("/", function () {
//     return 'redirected';
// });

// Route::redirect('/index', '/');

Route::get("/users", function (Request $request) {
    return null;
});

Route::get('/get-text', function () {
    return response("Hello DaVinziCode", 200)
        ->header('content-type', 'text/plain');
});



Route::get("/user/{id}", function ($id) {
    return response($id, 200); //nag papasa ng data sa url
});



Route::get("/login", [IndexController::class, "index"])->name('login');

// Route::get("/index/{id}", [IndexController::class, "index"])->middleware('auth'); //to protect routes
Route::get("/index/{id}", [IndexController::class, "index"]);
Route::get("/user/{id}", [IndexController::class, "show"]);

Route::get("/user/{id}/{group}", function ($id, $group) {
    return response($id . '-' . $group, 200); //nag papasa ng data sa url by group
});

Route::get("/request-json", function () {
    return response()->json(['name' => 'DaVinziCode', 'age' => '30', 'gender' => 'male']);
}); //how to response using json

Route::get("/request-download", function () {

    $path = public_path() . '/sample.txt';
    $name = 'sample.txt';
    $headers = array(
        'Content-type : application/text-plain'
    );
    return response()->download($path, $name, $headers);
});