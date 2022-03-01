<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\BlogController;

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


Route::get('/signup', [SignupController::class,'signup']);
Route::post('/signup', [SignupController::class,'addData']);

Route::get('/img', [SignupController::class,'imgSignup']);
Route::post('/img', [SignupController::class,'addImage']);

Route::get('/show', [SignupController::class,'showDetails']);
Route::get('/show/{id}', [SignupController::class,'status_update']);
// Route::get('/show/{id}','SignupController@status_update');

// login url
Route::get('/login', [SignupController::class,'login']);
Route::post('/login', [SignupController::class,'loginDetail']);

// blog url
Route::get('/blog', [SignupController::class,'blog']);
Route::post('/blog', [SignupController::class,'blogdetails']);


// logout url
Route::get('/logout', [SignupController::class,'logout']);



Route::group(['middleware'=>"blogware"],function(){
    Route::view('home','home');   
    Route::view('aboutus','aboutus');  
    Route::get('/addblog', [BlogController::class,'addBlog']);
    Route::post('/addblog', [BlogController::class,'addBlogdetails']);  
    Route::get('/showblogs', [BlogController::class,'showBlogs']);
    Route::get('/showblogs/{id}', [BlogController::class,'updateBlogStatus']);  
});
