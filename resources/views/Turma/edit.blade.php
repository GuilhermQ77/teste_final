@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')
<h1>Editar turma</h1>
<form action="{{route("turma.update" , $turma->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="descrição">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Insira a descrição" value="{{$turma->descricao}}">
    </div>
    <div class="form-group">
        <label for="">Cursos:</label>
        <select class="for-control" name="curso_id" id="curso_id">
            <option value="{{ $turma->curso_id}}" selected>{{$turma->curso->nome}}</option>
            @foreach($cursos as $curso)
            <option value="{{$curso->id}}">{{$curso->nome}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Salvar</button>
</form>
@endsection