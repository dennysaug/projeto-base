<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

use Illuminate\Support\Facades\Auth;

Route::get('/', 'DefaultController@index');

Route::post('login', [
    'as' => 'controle.login.autenticar',
    'uses' => 'Auth\AuthController@autenticar'
]);

Route::get('loga', function() {
    Auth::loginUsingId(1);
});

Route::group(['prefix' => 'controle', 'middleware' => 'auth'], function() {

    Route::get('/', [
        'as' => 'controle.home.index',
        'uses' => 'Controle\HomeController@index'
    ]);

});
