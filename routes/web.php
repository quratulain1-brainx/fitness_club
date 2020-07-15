<?php

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

Route::get('/member',function (){
    return view('admin.addMember');
});

Route::get('/trainer',function (){
    return view('admin.viewTrainer');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->group(function(){
    Route::resource('/users', 'UsersController',[
        'only' => ['index', 'edit', 'update','destroy']
    ]);
    Route::resource('/user-members','MemberController');
    Route::resource('/user-trainer','TrainerController');
});



