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

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::group([
    'middleware' => 'acl',
    'roles' => '1',

], function(){
Route::get('/events','EventsController@index')
    ->name('events.index');
Route::post('/events','EventsController@addEvent')
    ->name('events.add');

Route::get('/events/panel','EventsController@panel')
    ->name('events.panel');
Route::get('/events/termin','EventsController@termin')
    ->name('events.termin');
Route::get('/events/callendar','EventsController@callendar')
    ->name('events.callendar');
Route::get('/events/panel/{event}/edit','EventsController@edit')
    ->name('events.edit');
Route::put('/events/panel/{event}','EventsController@update')
    ->name('events.update');
Route::delete('/events/panel/{event}','EventsController@destroy')
    ->name('events.destroy');

// Route::resource('events','EventsController');




Route::resource('users','UsersController');

Route::resource('suggestions','SuggestionsController');


});
