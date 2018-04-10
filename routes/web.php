<?php

use App\Events\SignaalEvent;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','GastController@index')->name('visitor'); //bezoekerspagina

Route::get('/userhistory', 'UserHistoryController@index')->name('userHistory'); // geschiedenis bekijken

Auth::routes();//auths routs
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');//loguit

Route::get('/home', 'HomeController@index')->name('home');//homepage als ingelogd

Route::get('/vragenlijst', 'vragenlijstController@index')->name('vragenlijst'); // vragenlijstPAGE

Route::post('/voerVragenlijstIn', 'vragenlijstController@voerVragenlijstIn')->name('voerVragenlijstIn'); //vragenlijstinvoerenFORM

Route::get('/addSignaaltoDbEvent/{timestamp}/{uv}',function($apivalue,$uv){ // voert event uit als dit geopend gegaan wordt.
    event(new SignaalEvent($apivalue,$uv));
    return 'OK:noerror';
})->name('addSignaaltoDbEvent');


Route::post('/addUserHistory', 'UserHistoryController@add')->name('addUserHistory'); //toevoegen
Route::get('/phpinfo',function(){dd(phpinfo());  });

Route::post('/veranderGrafiek', 'UserHistoryController@veranderGrafiek')->name('veranderGrafiek'); //geschiedenis andere dag bekijken

