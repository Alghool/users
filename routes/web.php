<?php

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

use App\Group;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user','UserController');
Route::resource('group','GroupController');

Route::get('test', function(){
   $group = Group::findOrFail(5);
    $group->permissions()->attach([1,2,3]);

    dd($group);
});
