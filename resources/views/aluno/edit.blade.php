@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')
<h1>Editar aluno</h1>
<form action="{{route("aluno.update" , $aluno->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="">Matrícula</label>
    <input type="text" name="matricula" id="matricula" value="{{ $aluno->matricula }}">
    <label for="">Nome</label>
    <input type="text" name="nome" id="nome" value="{{ $aluno->nome }}">
    <label for="">Email</label>
    <input type="text" name="email" id="email" value="{{ $aluno->email }}">
    <label for="">Data de nascimento</label>
    <input type="date" name="data_nascimento" id="data" value="{{ $aluno->data_nascimento }}">

    <div class="col">
        <div class="col">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto">
        </div>
        <img src="{{ asset($aluno->foto)}}" alt="" style="max-width: 400px;">
    </div>

    <div class="form-group">
        <label for="">Turma</label>

         <select class="form-control" name="turma_id" id="turma_id">
                <option value="">Selecione</option>
                @foreach($turmas as $turma)
                    <option value="{{$turma->id}}">{{$turma->descricao}}</option>
                @endforeach
            </select>
    </div>
     <div class="col">
            <label for="">Telefone</label>
    <input type="text" name="telefone" id="telefone" value="{{ $aluno->contatoAluno?->telefone}}">
        </div>
    <div>
        <button type="submit">Salvar</button>
    </div>
</form>
@endsection