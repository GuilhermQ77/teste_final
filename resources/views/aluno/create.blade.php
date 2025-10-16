@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')
<h1>Cadastro de aluno</h1>
<form action="{{route("aluno.store") }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
            <label for="nome">Matricula:</label>
            <input type="text" class="form-control" placeholder="Sua matrícula" name="matricula" id="matricula">
        </div>
        <div class="col">
            <label for="">Nome:</label>
            <input type="text" class="form-control" placeholder="Seu nome" name="nome" id="nome">
        </div>
        <div class="col">
            <label for="">Email:</label>
            <input type="email" class="form-control" placeholder="Seu email" name="email" id="email">
        </div>
        <div class="col">
            <label for="">Data de Nascimento:</label>
            <input type="date" class="form-control" name="data_nascimento" id="data">
        </div>
    </div>

    </div>


    <br>
    <div class="col">
        <div class="col">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto">
        </div><br>
        <br>
        <div class="col">
            <label for="" class="form-label">Turma:</label>
            <select name="turma_id" id="turma_id" class="form-label">
                <option value="">Selecione</option>
                @foreach($turmas as $turma)
                <option value="{{ $turma->id }}">{{ $turma->descricao}}</option>
                @endforeach
            </select>
        </div>
         <div class="col">
            <label for="">Telefone:</label>
            <input type="text" class="form-control" placeholder="Coloque se telefone" name="telefone" id="telefone">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary mb-2">Salvar</button>
        </div>


</form>
@endsection