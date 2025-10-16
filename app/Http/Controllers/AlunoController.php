<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;

class AlunoController extends Controller
{

    public function index()
    {
        $turmas = Turma::all();
        $alunos = Aluno::all();
        $aluno_niver = Aluno::where('data_nascimento','2005-05-10')->get();
        $aluno_name = Aluno::where('nome', 'like','%Silva%')->get();
        $aluno_data = Aluno::whereDate('data_nascimento', '<', '2006-01-01')->get(); 
        $aluno_entre = Aluno::whereDate('data_nascimento', '>', '2004-01-01' )->where('data_nascimento','<','2006-12-31')->get(); 
        $aluno_datas = Aluno::whereDate('data_nascimento', '<', '2005-01-01')->where('email','like','%gmail.com')->get(); 
        return view('aluno.index', compact('alunos', 'aluno_niver', 'aluno_name', 'aluno_data','aluno_entre', 'aluno_datas'));
    }

    public function contato()
    {
        return view('aluno.contato');
    }


    public function create()
    {
        $turmas = Turma::all();
        return view('aluno.create', compact('turmas'));
    }


    public function store(Request $request)
    {
        $nome_arquivo = pathinfo($request->foto->getClientOriginalName(), PATHINFO_FILENAME);
        $extensao_arquivo = $request->foto->getClientOriginalExtension();
        $foto = $nome_arquivo . '-' . time() . '-' . $extensao_arquivo;

        $request->foto->move(public_path('imagens'), $foto);
        $aluno = Aluno::create([
            'matricula' => $request->matricula,
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'foto' => 'imagens/' . $foto
        ]);

        $aluno->turmas()->attach($request->turma_id);

        $aluno->contatoAluno()->create([
            'telefone' => $request->telefone
        ]);

        return redirect()->route('aluno.index');
    }

    public function show(string $id)
    {

        $aluno = Aluno::find($id);
        
        return view('aluno.show', compact('aluno'));
    }

    public function edit(string $id)
    {
        $aluno = Aluno::find($id);
        $turmas = Turma::all();
        return view('aluno.edit', compact('aluno', 'turmas'));
    }

    public function update(Request $request, string $id)
    {
        $foto = null;
        if ($request->hasFile('foto')) {
            $nome_arquivo = pathinfo($request->foto->getClientOriginalName(), PATHINFO_FILENAME);
            $extensao_arquivo = $request->foto->getClientOriginalExtension();
            $foto = $nome_arquivo . '-' . time() . '-' . $extensao_arquivo;

            $request->foto->move(public_path('imagens'), $foto);
        }

        $aluno = Aluno::find($id);
        $aluno->update([
            'matricula' => $request->matricula,
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'foto' => 'imagens/' . isset($foto) ? $foto: $aluno->foto
        ]);
        $aluno->turmas()->syncwithoutDetaching($request->turma_id);

        $aluno->contatoAluno()->update([
            'telefone' => $request->telefone
        ]);
        return redirect()->route('aluno.index');
    }


    public function destroy(string $id)
    {
        $aluno = Aluno::find($id);
        $aluno->delete();
        return redirect()->route('aluno.index');
    }
}
