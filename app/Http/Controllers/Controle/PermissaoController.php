<?php

namespace App\Http\Controllers\Controle;

use App\CategoriaTransacao;
use App\GrupoUsuario;
use App\Http\Controllers\Controller;
use App\Usuario;
use Illuminate\Http\Request;


class PermissaoController extends Controller
{
    
    public function index(GrupoUsuario $grupo)
    {
//        $this->verificaPermissao('usuario.visualizar');
        $grupos = GrupoUsuario::orderBy('nome', 'asc')->get()->lists('nome','id')->toArray();
        $data = ['grupos'];

        if(isset($grupo)) {
            $categoria_transacaos = CategoriaTransacao::orderBy('nome')->get();
            $permissao = $grupo->permissao->lists('permissao', 'id')->toArray();
            array_push($data, 'grupo', 'permissao','categoria_transacaos');
        }

        return view('controle.permissao.index', compact($data));
    }

    public function salvar(Request $request, GrupoUsuario $grupo)
    {
        $permissao = $request->input('permissao');

        if ($grupo->id) {
            $this->verificaPermissao('permissao.alterar');
            if ($grupo->permissao()->sync($permissao?$permissao:[])) {
                $permissao = $grupo->permissao->lists('permissao', 'id')->toArray();
                session(['permissao' => $permissao]);
                return redirect()->route('controle.permissao.index')->with('error', false);
            }

        }

        if (!$grupo->id) {
            return redirect()->route('controle.permissao.index', $grupo)->with('error', true);
        }

    }
}
