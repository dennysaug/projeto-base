<?php

namespace App\Http\Controllers\Controle;

use App\Http\Controllers\Controller;
use App\Http\Requests\Controle\GrupoUsuarioRequest;

class GrupoUsuarioController extends Controller
{
    
    public function index()
    {
        $this->verificaPermissao('grupo-usuario.visualizar');

        $grupos = GrupoUsuario::where('tipo_id', 0)->orderBy('ordem', 'asc');
        $total = $grupos->count();

        $grupos = $grupos->paginate(50);

        $data = ['grupos', 'total'];

        return view('controle.grupo.index', compact($data));
    }

    public function form(GrupoUsuario $grupo = null)
    {
        $data = [];

        if (isset($grupo->id)) {
            $this->verificaPermissao('grupo.alterar');
            array_push($data, 'grupo');
        }
        else
        {
            $this->verificaPermissao('grupo.cadastrar');
        }

        return view('controle.grupo.form', compact($data));
    }

    public function save(GrupoUsuarioRequest $request, GrupoUsuario $grupo = null)
    {
        $input = $request->except('_token');
        $imagem = $request->file();

        $route = 'controle.grupo.index';
        if(isset($tipo)) {
            $route = 'controle.grupo.'.$tipo.'.form';
        }

        if ($grupo->id) {

            if ($grupo->update($input)) {
                return redirect()->route($route)->with('msg', 'Operação realizada com sucesso')->with('error', false);
            }

        } else {
            $grupo = GrupoUsuario::create($input);
            return redirect()->route($route)->with('msg', 'Operação realizada com sucesso')->with('error', false);
        }

        if (!$grupo->id) {
            return redirect()->route('controle.grupo.form', $id)->with('msg', 'Não foi possível efetuar a operação')->with('error', true);
        }

    }

    public function excluir(GrupoUsuario $grupo)
    {
        $this->verificaPermissao('grupo.excluir');

        if ($grupo and $grupo->delete()) {
            return redirect()->route('controle.grupo.index')->with('msg', 'Operação realizada com sucesso')->with('error', false);
        }

        return redirect()->route('controle.grupo.index')->with('msg', 'Não foi possível efetuar a operação')->with('error', true);
    }

    public function excluirImagem(GrupoUsuario $grupo)
    {
        Upload::deleta($grupo->imagem, $this->destino);
        $grupo->update(['imagem' => '']);
        return redirect()->route('controle.grupo.'.$tipo.'.form', $grupo)->with('msg', 'Operação realizada com sucesso')->with('error', false);

    }


}
