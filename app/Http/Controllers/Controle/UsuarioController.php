<?php

namespace App\Http\Controllers\Controle;

use App\GrupoUsuario;
use App\Http\Requests\Controle\UsuarioRequest;
use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{
    
    public function index()
    {
        $this->verificaPermissao('usuario.visualizar');
        $usuarios = Usuario::orderBy('nome', 'asc')->get();

        return view('controle.usuario.index', compact('usuarios'));
    }

    public function editar(Usuario $usuario = null)
    {
        $data = ['grupos'];

        $grupos = GrupoUsuario::orderBy('nome', 'asc')->get()->lists('nome','id')->toArray();

        if (isset($usuario->id)) {
            $this->verificaPermissao('usuario.alterar');
            array_push($data, 'usuario');
        }
        else
        {
            $this->verificaPermissao('usuario.cadastrar');
        }

        return view('controle.usuario.edit', compact($data));
    }

    public function salvar(UsuarioRequest $request, Usuario $usuario = null)
    {
        $input = $request->except('_token');
        if($input['password']  <> $input['confirme']) {
            unset($input['password']);
        }

        if ($usuario->id) {
            $this->verificaPermissao('usuario.alterar');
            if ($usuario->update($input)) {
                return redirect()->route('controle.usuario.index')->with('error', false);
            }

        } else {
            $this->verificaPermissao('usuario.cadastrar');
            $usuario = Usuario::create($input);
            return redirect()->route('controle.usuario.index')->with('error', false);
        }

        if (!$usuario->id) {
            return redirect()->route('controle.usuario.edit', $usuario)->with('error', true);
        }

    }

    public function excluir(Usuario $usuario)
    {
        $this->verificaPermissao('usuario.excluir');

        if ($usuario and $usuario->delete()) {
            return redirect()->route('controle.grupo.index')->with('error', false);
        }
        return redirect()->route('controle.grupo.index')->with('error', true);
    }

}
