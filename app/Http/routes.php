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

    Route::get('rota/{nome}', [
        'as' => 'controle.home.index',
        'uses' => 'Controle\HomeController@rota'
    ]);

    ################################## GRUPO DE USUÁRIO ##################################
    Route::get('grupo-usuario', [
        'as' => 'controle.grupousuario.index',
        'uses' => 'Controle\GrupoUsuarioController@index'
    ]);

    Route::get('grupo-usuario/editar/{grupo?}', [
        'as' => 'controle.grupousuario.form',
        'uses' => 'Controle\GrupoUsuarioController@editar'
    ]);

    Route::post('grupo-usuario/salvar/{grupo?}', [
        'as' => 'controle.grupousuario.salvar',
        'uses' => 'Controle\GrupoUsuarioController@salvar'
    ]);

    Route::get('grupo-usuario/excluir/{grupo?}', [
        'as' => 'controle.grupousuario.excluir',
        'uses' => 'Controle\GrupoUsuarioController@excluir'
    ]);
    ########################################################################################
    ###################################### USUÁRIO #########################################
    Route::get('usuario', [
        'as' => 'controle.usuario.index',
        'uses' => 'Controle\UsuarioController@index'
    ]);

    Route::get('usuario/editar/{usuario?}', [
        'as' => 'controle.usuario.form',
        'uses' => 'Controle\UsuarioController@editar'
    ]);

    Route::post('usuario/salvar/{usuario?}', [
        'as' => 'controle.usuario.salvar',
        'uses' => 'Controle\UsuarioController@salvar'
    ]);

    Route::get('usuario/excluir/{usuario?}', [
        'as' => 'controle.usuario.excluir',
        'uses' => 'Controle\UsuarioController@excluir'
    ]);
    ########################################################################################
    ###################################### TESTE #########################################
    Route::get('teste', [
        'as' => 'controle.teste.index',
        'uses' => 'Controle\TesteController@index'
    ]);

    Route::get('teste/editar/{usuario?}', [
        'as' => 'controle.teste.editar',
        'uses' => 'Controle\TesteController@editar'
    ]);

    Route::post('teste/salvar/{usuario?}', [
        'as' => 'controle.teste.salvar',
        'uses' => 'Controle\TesteController@salvar'
    ]);

    Route::get('teste/excluir/{usuario?}', [
        'as' => 'controle.teste.excluir',
        'uses' => 'Controle\TesteController@excluir'
    ]);
    ########################################################################################
    ##NOVASROTAS##

});
