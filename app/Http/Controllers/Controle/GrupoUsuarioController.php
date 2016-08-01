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

        return view('controle.grupo-usuario.index', compact('grupos'));
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

        return view('controle.grupo-usuario.edit', compact($data));
    }

    public function salvar(GrupoUsuario $grupo = null, Request $request)
    {
        $input = $request->except('_token');

        if ($grupo->id) {
            $this->verificaPermissao('grupo-usuario.alterar');
            if ($grupo->update($input)) {
                return redirect()->route('controle.grupo-usuario.index')->with('error', false);
            }

        } else {
            $this->verificaPermissao('grupo-usuario.cadastrar');
            $grupo = GrupoUsuario::create($input);
            return redirect()->route('controle.grupo-usuario.index')->with('error', false);
        }

        if (!$grupo->id) {
            return redirect()->route('controle.grupo-usuario.form', $grupo)->with('error', true);
        }

    }

    public function excluir(GrupoUsuario $grupo)
    {
        $this->verificaPermissao('grupo-usuario.excluir');

        if ($grupo and $grupo->delete()) {
            return redirect()->route('controle.grupo-usuario.index')->with('error', false);
        }
        return redirect()->route('controle.grupo-usuario.index')->with('error', true);
    }

}
