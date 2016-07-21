<?php

namespace App\Http\Controllers\Controle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        dump(Auth::user());
        return 'HOME DO CONTROLLE';
    }
}
