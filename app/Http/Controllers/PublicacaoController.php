<?php

namespace App\Http\Controllers;

use App\Models\Publicacao;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicacaoController extends Controller
{
    public function like(Publicacao $publicacao)
    {
        // Increment the like counter on the publication
        $publicacao->like = ($publicacao->like ?? 0) + 1;
        $publicacao->save();

        return back();
    }
    public function dislike(Publicacao $publicacao)
    {
        // Increment the dislike counter on the publication
        $publicacao->dislike = ($publicacao->dislike ?? 0) + 1;
        $publicacao->save();

        return back();
    }

    public function comentar(Request $request, Publicacao $publicacao)
    {
        $request->validate([
            'comentario' => 'required|string|max:1000',
        ]);
        $publicacao->comentarios()->create([
            'comentario' => $request->comentario,
            'user_id' => Auth::id(),
        ]);

        return back();
    }
     

    public function index()
    {
        $publicacoes = Publicacao::all();

        return view('index', compact('publicacoes'));
    }
}
