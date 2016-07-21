<?php

namespace App\Http\Controllers\Controle;

use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{
    
    public function index()
    {
        $this->verificaPermissao('usuario.visualizar');
        $usuarios = Usuario::orderBy('nome', 'asc')->get();

        return $usuarios;

//        return view('controle.grupo.index', compact('grupos'));
    }

    public function editar(Usuario $usuario = null)
    {
        $data = [];

        if (isset($usuario->id)) {
            $this->verificaPermissao('usuario.alterar');
            array_push($data, 'usuario');
        }
        else
        {
            $this->verificaPermissao('usuario.cadastrar');
        }

        return $usuario;

//        return view('controle.grupo.form', compact($data));
    }

    public function salvar(Request $request, Usuario $usuario = null)
    {
        $input = $request->except('_token');

        if ($usuario->id) {
            $this->verificaPermissao('usuario.alterar');
            if ($usuario->update($input)) {
                return 'Atualizou!';
//                return redirect()->route('controle.grupo.index')->with('msg', 'Operação realizada com sucesso')->with('error', false);
            }

        } else {
            $this->verificaPermissao('usuario.cadastrar');
            $usuario = Usuario::create($input);
            return 'Cadastrou. id: ' . $usuario->id;
//            return redirect()->route('controle.grupo.index')->with('msg', 'Operação realizada com sucesso')->with('error', false);
        }

        if (!$usuario->id) {
            return 'erro!';
//            return redirect()->route('controle.grupo.form', $grupo)->with('msg', 'Não foi possível efetuar a operação')->with('error', true);
        }

    }

    public function excluir(Usuario $grupo)
    {
        $this->verificaPermissao('usuario.excluir');

        if ($usuario and $usuario->delete()) {
            return 'Excluído com sucesso';
//            return redirect()->route('controle.grupo.index')->with('msg', 'Operação realizada com sucesso')->with('error', false);
        }
        return 'Erro!';
//        return redirect()->route('controle.grupo.index')->with('msg', 'Não foi possível efetuar a operação')->with('error', true);
    }

}
