<?php
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\TheatresController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MoviePostController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/movies',[MovieController::class,"showmovie"]);
//Route::get('/actors',[ActorController::class,"showactor"]);
//Route::any('/theatres',[TheatresController::class,"showtheatres"]);
Route::any('/dashboard',[dashboardcontroller::class,"showdash"]);

Route::resource('movies','App\Http\Controllers\MovieController');
Route::resource('theatres','App\Http\Controllers\TheatresController');
Route::resource('actors','App\Http\Controllers\ActorController');

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/movieuser', [LoginController::class,'showBloggerLoginForm']);
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::get('/register/movieuser', [RegisterController::class,'showBloggerRegisterForm']);

Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/login/movieuser', [LoginController::class,'bloggerLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);
Route::post('/register/movieuser', [RegisterController::class,'createBlogger']);

Route::group(['middleware' => 'auth:movieuser'], function () {
    Route::view('/movieuser', 'movieuser');
});

Route::group(['middleware' => 'auth:admin'], function () {
    
    Route::view('/admin', 'admin');
});

Route::get('logout', [LoginController::class,'logout']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/moviepost',[MoviePostController::class,'get_all_blog_post']);