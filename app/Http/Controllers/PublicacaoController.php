<?php

namespace App\Http\Controllers;

use App\Models\Publicacao;
use Illuminate\Http\Request;

class PublicacaoController extends Controller
{
    public function like($id)
    {
        $publicacao = Publicacao::findOrFail($id);
        $publicacao->like++;
        $publicacao->update();

        return redirect()->back()->with('success', 'Curtiu!');
    }
    public function dislike($id)
    {
        $publicacao = Publicacao::findOrFail($id);
        $publicacao->dislike++;
        $publicacao->update();

        return redirect()->back()->with('success', 'Curtiu!');
    }

    public function index()
    {
        $publicacoes = Publicacao::all();

        return view('index', compact('publicacoes'));
    }
}
