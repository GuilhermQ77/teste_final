@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')
<h1>Insira o curso</h1>
<form action="{{route("curso.store") }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
            <label for="">Insira o nome do curso:</label>
            <input type="text" class="form-control" placeholder="Insira o nomed do curso" name="nome" id="nome">

            <div class="col">
                <button type="submit" class="btn btn-primary mb-2">Salvar</button>
            </div>
        </div>

</form>
@endsection