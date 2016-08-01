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

Route::get('/', 'DefaultController@index');

Route::get('auth/login', [
    'as' => 'controle.login.index',
    'uses' => 'Auth\AuthController@index'
]);

Route::post('auth/login', [
    'as' => 'controle.login.autenticar',
    'uses' => 'Auth\AuthController@autenticar'
]);

Route::get('loga', function() {
    Auth::loginUsingId(1);
});

Route::group(['prefix' => 'controle', 'middleware' => 'auth'], function() {

    Route::get('auth/logout', [
        'as' => 'controle.logout.index',
        'uses' => 'Auth\AuthController@logout'
    ]);

    Route::get('/', [
        'as' => 'controle.home.index',
        'uses' => 'Controle\HomeController@index'
    ]);

    Route::get('rota/{nome?}', [
        'as' => 'controle.rota.index',
        'uses' => 'Controle\HomeController@rota'
    ]);

    ################################## GRUPO DE USUÁRIO ##################################
    Route::get('grupo-usuario', [
        'as' => 'controle.grupo-usuario.index',
        'uses' => 'Controle\GrupoUsuarioController@index'
    ]);

    Route::get('grupo-usuario/editar/{grupo?}', [
        'as' => 'controle.grupo-usuario.edit',
        'uses' => 'Controle\GrupoUsuarioController@editar'
    ]);

    Route::post('grupo-usuario/salvar/{grupo?}', [
        'as' => 'controle.grupo-usuario.salvar',
        'uses' => 'Controle\GrupoUsuarioController@salvar'
    ]);

    Route::get('grupo-usuario/excluir/{grupo?}', [
        'as' => 'controle.grupo-usuario.excluir',
        'uses' => 'Controle\GrupoUsuarioController@excluir'
    ]);
    ########################################################################################
    ###################################### USUÁRIO #########################################
    Route::get('usuario', [
        'as' => 'controle.usuario.index',
        'uses' => 'Controle\UsuarioController@index'
    ]);

    Route::get('usuario/editar/{usuario?}', [
        'as' => 'controle.usuario.edit',
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
    ##################################### PERMISSÃO #########################################
    Route::get('permissao/{grupo?}', [
        'as' => 'controle.permissao.index',
        'uses' => 'Controle\PermissaoController@index'
    ]);

    Route::post('permissao/salvar/{grupo?}', [
        'as' => 'controle.permissao.salvar',
        'uses' => 'Controle\PermissaoController@salvar'
    ]);
    ########################################################################################
    ##################################### LOG #########################################
    Route::get('log', [
        'as' => 'controle.log.index',
        'uses' => 'Controle\LogController@index'
    ]);
    ########################################################################################
    ##NOVASROTAS##

});
