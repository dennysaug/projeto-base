###################################### ##NOME## #########################################
    Route::get('##nome##', [
        'as' => 'controle.##nome##.index',
        'uses' => 'Controle\##Nome##Controller@index'
    ]);

    Route::get('##nome##/editar/{usuario?}', [
        'as' => 'controle.##nome##.editar',
        'uses' => 'Controle\##Nome##Controller@editar'
    ]);

    Route::post('##nome##/salvar/{usuario?}', [
        'as' => 'controle.##nome##.salvar',
        'uses' => 'Controle\##Nome##Controller@salvar'
    ]);

    Route::get('##nome##/excluir/{usuario?}', [
        'as' => 'controle.##nome##.excluir',
        'uses' => 'Controle\##Nome##Controller@excluir'
    ]);
    ########################################################################################
    ##NOVASROTAS##