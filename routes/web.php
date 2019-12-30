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

Route::get('/', function () {
    return view('welcome');
});

/*-------YOUR ROUTES NEEDS TO STAY IN A PARTICULAR ORDER-------- */
/*------- EG. /P/CREATE SHOULD COME BEFORE /P/{POST}-------*/
/*-------ROUTES LIKE THIS (/P/{POST}) SHOULD ALWAYS BE AT THE END*/

Auth::routes();

Route::post('follow/{user}', 'FollowsController@store');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show'); //Get request to display a user's profile
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit'); //Get request for displaying editing profile page
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');  //Patch request to edit profile

Route::get('/p/create', 'PostsController@create'); //Get route to access the create post form
Route::post('/p', 'PostsController@store'); //Get route to access the create post form
Route::get('/p/{post}', 'PostsController@show'); //Get route to access the create post form


//-----------------------------------------------------------

//Testing endpoints
// Route::post('follow/{user}', function(){
//   return view('Welcoem to follow');
// });
