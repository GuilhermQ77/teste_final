<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Curso;

class TurmaController extends Controller
{

    public function index()
    {
        $turmas = Turma::all();
        $turma_id_maior = Turma::where('id', '>', '10')->get();
        $turma_conta = Turma::count();
        return view('turma.index', compact('turmas','turma_id_maior','turma_conta'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('turma.create', compact('cursos'));
    }

    public function store(Request $request)
    {

        Turma::create([
            'descricao' => $request->descricao,
            'curso_id' => $request->curso_id
        ]);
        return redirect()->route('turma.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $turma = Turma::with('curso')->find($id);
        return view('turma.show', compact('turma'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $turma = Turma::find($id);
        $cursos = Curso::all();
        return view('turma.edit', compact('turma', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        Turma::find($id)->update([
            'descricao' => $request->descricao,
            'curso_id' => $request->curso_id
        ]);
        return redirect()->route('turma.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $turma = Turma::find($id);
        $turma->delete();
        return redirect()->route('turma.index');
    }
}
