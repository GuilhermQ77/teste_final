<?php

namespace App\Http\Controllers;

use App\Models\Publicacao;
use App\Models\Comentario;
use App\Models\likes;
use App\Models\dislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicacaoController extends Controller
{
    public function index()
    {
        $publicacoes = Publicacao::with(['comentario.user'])->get();
        $total_likes = likes::count();
        $total_dislikes = dislike::count();
        foreach ($publicacoes as $publicacao) {
            $publicacao->likes_count = likes::where('publicacao_id', $publicacao->id_publicacao)->count();
            $publicacao->deslikes_count = dislike::where('publicacao_id', $publicacao->id_publicacao)->count();
            $publicacao->comentarios_count = $publicacao->comentario->count();

            $publicacao->user_liked = Auth::check() ?
                likes::where('publicacao_id', $publicacao->id_publicacao)
                ->where('user_id', Auth::id())
                ->exists() : false;

            $publicacao->user_disliked = Auth::check() ?
                dislike::where('publicacao_id', $publicacao->id_publicacao)
                ->where('user_id', Auth::id())
                ->exists() : false;

            $publicacao->user_liked = Auth::check() ?
                likes::where('publicacao_id', $publicacao->id_publicacao)
                ->where('user_id', Auth::id())
                ->exists() : false;

            $publicacao->user_disliked = Auth::check() ?
                dislike::where('publicacao_id', $publicacao->id_publicacao)
                ->where('user_id', Auth::id())
                ->exists() : false;
        }

        $user_likes_count = 0;
        $user_dislikes_count = 0;

        if (Auth::check()) {
            $user_likes_count = likes::where('user_id', Auth::id())->count();
            $user_dislikes_count = dislike::where('user_id', Auth::id())->count();
        }

        return view('index', compact('publicacoes', 'total_likes', 'total_dislikes', 'user_likes_count', 'user_dislikes_count'));
    }

    public function like($id_publicacao)
    {
        $publicacao = Publicacao::where('id_publicacao', $id_publicacao)->firstOrFail();
        $user = Auth::user();
        $likeExistente = likes::where('publicacao_id', $id_publicacao)
            ->where('user_id', $user->id)
            ->first();

        if ($likeExistente) {

            $likeExistente->delete();;
        } else {
            likes::create([
                'publicacao_id' => $id_publicacao,
                'user_id' => $user->id,
                'likes' => 1
            ]);
        }

        return redirect()->back();
    }
    public function dislike($id_publicacao)
    {
        $publicacao = Publicacao::where('id_publicacao', $id_publicacao)->firstOrFail();
        $user = Auth::user();
        $deslikeExistente = dislike::where('publicacao_id', $id_publicacao)
            ->where('user_id', $user->id)
            ->first();

        if ($deslikeExistente) {
            $deslikeExistente->delete();
        } else {
            dislike::create([
                'publicacao_id' => $id_publicacao,
                'user_id' => $user->id,
                'dislikes' => 1
            ]);
        }

        return redirect()->back();
    }

    public function comentario(Request $request, Publicacao $publicacao)
    {
        $request->validate([
            'comentario' => 'required|string|max:500',
        ]);

        comentario::create([
            'publicacao_id' => $publicacao->id_publicacao,
            'user_id' => Auth::id(),
            'comentario' => $request->comentario,
        ]);
        return redirect()->back();
    }

    public function editarComentario(Request $request, Comentario $comentario)
    {
        if ($comentario->user_id !== auth::id()) {
            abort('Acesso negado');
        }

        $request->validate([
            'comentario' => 'required|string|max:500',
        ]);

        $comentario->update([
            'comentario' => $request->comentario,
        ]);

        return back()->with('success', 'Comentário atualizado com sucesso!');
    }
}
