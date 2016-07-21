<?php

namespace App\Http\Controllers\Controle;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        dump(Auth::user());
        return 'HOME DO CONTROLLE';
    }

    public function rota($nome)
    {
        $search = ['##NOME##', '##Nome##', '##nome##'];
        $replace = [strtoupper($nome), ucfirst($nome), strtolower($nome)];

        chmod(app_path('Http/Controllers/Controle'), 0777);
        chmod(app_path('Http/routes.php'), 0777);

        #### CRIA ROTA
        #dar permissão no arquivos routes.php
        $modelo_rota = file_get_contents(storage_path('modelos/') . 'rotas.php');
        $routes_php = file_get_contents(app_path('Http/') . 'routes.php');



        $modelo_rota = str_replace($search, $replace, $modelo_rota);
        $routes_php = str_replace('##NOVASROTAS##', $modelo_rota, $routes_php);

        File::put(app_path('Http/') . 'routes.php', $routes_php);
        #############################################################################

        $controller = file_get_contents(storage_path('modelos/') . 'controller.php');
        $controller = str_replace($search, $replace, $controller);
        File::put(app_path('Http/Controllers/Controle/') . ucfirst($nome) . 'Controller.php', $controller);

        $out = shell_exec('cd ..;php artisan make:model ' . ucfirst($nome) . ' -m');

        return $out . '<br/><br/>Controller criado e rotas adicionadas.';
    }
}
