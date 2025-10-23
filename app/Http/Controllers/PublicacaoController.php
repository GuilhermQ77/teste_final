<?php

namespace App\Http\Controllers;

use App\Models\Publicacao;
use Illuminate\Http\Request;

class PublicacaoController extends Controller
{

    public function index()
    {
        return view('index');
    }
}
