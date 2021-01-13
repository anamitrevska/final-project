<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});
Route::get('/home', 'TaskController@showDashlet');
Route::get('/home/{sortParametar}', 'TaskController@sortDashlet');


// Task routes
Route::get('/tasks/search', 'TaskController@searchTasks'); 
Route::get('/tasks/create', 'TaskController@create');
Route::get('/tasks/list', 'TaskController@showList'); 
Route::get('/tasks/edit/{id}', 'TaskController@edit');
Route::get('/tasks/{id}', 'TaskController@show');
Route::get('/tasks/download/{filename}', 'TaskController@getFile');
Route::put('/tasks/update/{id}', 'TaskController@update');
Route::put('/tasks/editcomment/{taskId}/{id}', 'TaskController@editcomment');
Route::post('/tasks', 'TaskController@store');
Route::post('/tasks/uploadFile/{id}', 'TaskController@Upload');
Route::delete('/tasks/{id}', 'TaskController@destroy'); 
Route::put('/tasks/closeStatus/{id}', 'TaskController@closeStatus');
Route::put('/tasks/changeStatus/{id}', 'TaskController@changeStatus'); 
Route::put('/tasks/forward/{id}', 'TaskController@forwardTask'); 
Route::post('/tasks/addcomment/{id}', 'TaskController@addComment'); 

// Team routes
Route::get('/teams/create', 'TeamController@create');
Route::get('/teams/list', 'TeamController@showList'); 
Route::get('/teams/search', 'TeamController@searchTeams'); 
Route::get('/teams/edit/{id}', 'TeamController@edit');
Route::get('/teams/{id}', 'TeamController@show');
Route::post('/teams/users', 'TeamController@listUsers');
Route::put('/teams/update/{id}', 'TeamController@update');
Route::delete('/teams/{id}', 'TeamController@destroy'); 
Route::delete('/teams/removeUser/{id}', 'TeamController@deleteUser');
Route::post('/teams', 'TeamController@store');
Route::post('/teams/addUser', 'TeamController@addUser');

// User routes
Route::get('/users', 'UserController@searchUsers'); 
Route::get('/users/list', 'UserController@showList'); 
Route::get('/users/{id}', 'UserController@show'); 
Route::get('/users/edit/{id}', 'UserController@edit');
Route::put('/users/{id}', 'UserController@update');
Route::put('/users/changepassword/{id}', 'UserController@changepassword');
Route::delete('/users/{id}', 'UserController@destroy'); 
Route::delete('/users/removeTeam/{id}', 'UserController@removeTeam');
Route::post('/users/changeStatus', 'UserController@changeStatus');

Auth::routes([
    'register'=>true
]
);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home1', 'HomeController@index1');
