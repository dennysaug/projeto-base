<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index()
    {
//       Auth::loginUsingId(1);
//        Auth::logout();
        $this->verificaPermissao('permissao.visualizar'); # sem permissao
        $this->verificaPermissao('usuario.visualizar'); #com permissao

        return 'Olá mundo! home';
    }


}
