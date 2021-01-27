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
    return view('home');
});

Route::get('/mentions', function () {
  return view('mentionsLegales');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@sendMail')->name('contactForm');

Route::group(['middleware' => ['auth']], function () {
     
  Route::get('/strategie/{id}', 'StrategieController@index')->name('strategie.index');
  Route::post('/strategie/{id}/echeance', 'StrategieController@echeance')->name('strategie.echeance');
  Route::post('/strategie/{id}/prix', 'StrategieController@prix')->name('strategie.prix');
  Route::post('/strategie/{id}/resultats', 'StrategieController@resultats')->name('strategie.resultats');

    Route::get('/users/logout', 'Auth\LoginController@logout');
    route::resource('user','UserController', ['only' => ['show','edit','update']])->name('user','show');
    Route::resource('game','GameController', ['only' => ['show','edit','store']])->name('game','index');
    Route::resource('test','TestController', ['only' => ['show','edit','store']])->name('test','index');
   
    Route::resource('period','PeriodController')->name('period','index');
    Route::get('/bilan/{id}', 'BilanController@show')->name('bilan','show');
    Route::get('/replay/{idGame}', 'GameController@replay')->name('replay','show');

    Route::get('/gamebilan', function () {
        return view('game.gameBilan');
    })->name('gameBilan');

  Route::group(['middleware' => ['admin']], function () {

    Route::resource('editableParameter','EditableParameterController')->name('editableParameter','index');
    Route::resource('historicSpot','HistoricSpotController')->name('historicSpot','index');
    Route::resource('historicTerm','HistoricTermController')->name('historicTerm','index');
    Route::resource('information','InformationController')->name('information','index');
    Route::resource('message','MessageController')->name('message','index');
    Route::resource('administrateur','AdministrateurController')->name('administrateur','index');
    /*Route::resource('user','UserController')->name('user','index');
    Route::resource('game','GameController')->name('game','index');
    Route::resource('period','PeriodController')->name('period','index');*/

  });
});
