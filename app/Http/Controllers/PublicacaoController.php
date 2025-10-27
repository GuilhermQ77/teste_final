<?php

namespace App\Http\Controllers;

use App\Models\Publicacao;
use Illuminate\Http\Request;

class PublicacaoController extends Controller
{

    public function index()
    {
        $publicacoes = Publicacao::all();

        return view('index', compact('publicacoes'));
    }
}
