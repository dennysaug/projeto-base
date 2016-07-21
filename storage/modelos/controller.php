<?php

namespace App\Http\Controllers\Controle;

use App\##Nome##;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ##Nome##Controller extends Controller
{
    
    public function index()
    {
        $this->verificaPermissao('##nome##.visualizar');
        $##nome##s = ##Nome##::orderBy('nome', 'asc')->get();

        return $##nome##s;

//        return view('controle.grupo.index', compact('##nome##'));
    }

    public function editar(##Nome## $##nome## = null)
    {
        $data = [];

        if (isset($##nome##->id)) {
            $this->verificaPermissao('##nome##.alterar');
            array_push($data, '##nome##');
        }
        else
        {
            $this->verificaPermissao('##nome##.cadastrar');
        }

        return $##nome##;

//        return view('controle.grupo.form', compact($data));
    }

    public function salvar(Request $request, ##Nome## $##nome## = null)
    {
        $input = $request->except('_token');

        if ($##nome##->id) {
            $this->verificaPermissao('##nome##.alterar');
            if ($##nome##->update($input)) {
                return 'Atualizou!';
//                return redirect()->route('controle.grupo.index')->with('msg', 'Operação realizada com sucesso')->with('error', false);
            }

        } else {
            $this->verificaPermissao('##nome##.cadastrar');
            $##nome## = ##Nome##::create($input);
            return 'Cadastrou. id: ' . $##nome##->id;
//            return redirect()->route('controle.grupo.index')->with('msg', 'Operação realizada com sucesso')->with('error', false);
        }

        if (!$##nome##->id) {
            return 'erro!';
//            return redirect()->route('controle.grupo.form', $grupo)->with('msg', 'Não foi possível efetuar a operação')->with('error', true);
        }

    }

    public function excluir(##Nome## $grupo)
    {
        $this->verificaPermissao('##nome##.excluir');

        if ($##nome## and $##nome##->delete()) {
            return 'Excluído com sucesso';
//            return redirect()->route('controle.grupo.index')->with('msg', 'Operação realizada com sucesso')->with('error', false);
        }
        return 'Erro!';
//        return redirect()->route('controle.grupo.index')->with('msg', 'Não foi possível efetuar a operação')->with('error', true);
    }

}
