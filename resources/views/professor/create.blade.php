@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')

<body>
    <h1>Cadastro de professor</h1>
    <form action="{{route("professor.store") }}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Coloque seu nome">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Disciplina:</label>
            <input type="text" class="form-control" id="disciplina" name="disciplina" placeholder="Insira sua disciplina">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Insira seu email">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Insira seu telefone">
        </div>

        <br>
        <div class="col">
            <div class="col">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" id="foto">
            </div><br>
            <div class="col">
                <button type="submit" class="btn btn-primary mb-2">Salvar</button>
            </div>
           
    </form>

</body>
@endsection