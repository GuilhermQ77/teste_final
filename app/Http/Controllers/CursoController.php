<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    
    public function index()
    {
        $cursos = Curso::all();
        $cursos_info = Curso::where('nome', '!=', 'informática')->get();
        $cursos_tipo = Curso::where('nome', 'Administração')->orWhere('nome','Gestão')->get();
        return view('curso.index', compact('cursos', 'cursos_info','cursos_tipo'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Curso::create($request->all());
        return redirect()->route('curso.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso = Curso::find($id);
        return view('curso.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $curso = Curso::find($id);
        return view('curso.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        
        Curso::find($id)->update($request->all());
        return redirect()->route('curso.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Curso::find($id);
        $curso->delete();
        return redirect()->route('curso.index');
    }
}
