<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliacao;

class AvaliacaoController extends Controller
{
    public function like(Request $request)
    {
        $avaliacao = Avaliacao::find($request->publicacao_id);
        $avaliacao->likes++; 
        $avaliacao->update();

        return redirect()->back()->with('success', 'Valor incrementado com sucesso');
    }
}
