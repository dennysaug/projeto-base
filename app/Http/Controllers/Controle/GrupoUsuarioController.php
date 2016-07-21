<?php

namespace App\Http\Controllers\Controle;

use App\GrupoUsuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class GrupoUsuarioController extends Controller
{
    
    public function index()
    {
        $this->verificaPermissao('grupo-usuario.visualizar');
        $grupos = GrupoUsuario::orderBy('nome', 'asc')->get();

        return $grupos;

//        return view('controle.grupo.index', compact('grupos'));
    }

    public function editar(GrupoUsuario $grupo = null)
    {
        $data = [];

        if (isset($grupo->id)) {
            $this->verificaPermissao('grupo-usuario.alterar');
            array_push($data, 'grupo');
        }
        else
        {
            $this->verificaPermissao('grupo-usuario.cadastrar');
        }

        return $grupo;

//        return view('controle.grupo.form', compact($data));
    }

    public function salvar(Request $request, GrupoUsuario $grupo = null)
    {
        $input = $request->except('_token');

        if ($grupo->id) {
            $this->verificaPermissao('grupo-usuario.alterar');
            if ($grupo->update($input)) {
                return 'Atualizou!';
//                return redirect()->route('controle.grupo.index')->with('msg', 'Operação realizada com sucesso')->with('error', false);
            }

        } else {
            $this->verificaPermissao('grupo-usuario.cadastrar');
            $grupo = GrupoUsuario::create($input);
            return 'Cadastrou. id: ' . $grupo->id;
//            return redirect()->route('controle.grupo.index')->with('msg', 'Operação realizada com sucesso')->with('error', false);
        }

        if (!$grupo->id) {
            return 'erro!';
//            return redirect()->route('controle.grupo.form', $grupo)->with('msg', 'Não foi possível efetuar a operação')->with('error', true);
        }

    }

    public function excluir(GrupoUsuario $grupo)
    {
        $this->verificaPermissao('grupo-usuario.excluir');

        if ($grupo and $grupo->delete()) {
            return 'Excluído com sucesso';
//            return redirect()->route('controle.grupo.index')->with('msg', 'Operação realizada com sucesso')->with('error', false);
        }
        return 'Erro!';
//        return redirect()->route('controle.grupo.index')->with('msg', 'Não foi possível efetuar a operação')->with('error', true);
    }

}
