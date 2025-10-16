@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')
<h1>Lista da Turma</h1>

<table class="table">
    <thead class="thead-dark">
        <th>Descrição</th>
        <th>Curso</th>
        <th>Opções</th>
    </thead>
    <tbody>
        @foreach($turmas as $turma)
        <tr class="table-responsive-xl">
            <td>{{ $turma->descricao}}</td>
            <td>{{ $turma-> curso-> nome}}</td>

            <td><a href="{{ route('turma.edit',$turma->id)}}" class="btn btn-success">Editar</a>
                <a href="{{ route('turma.show',$turma->id)}}" class="btn btn-primary">Visualizar</a>
                <form action="{{route('turma.destroy',$turma->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<h2>Cursos com id maior q 10</h2>
@foreach($turma_id_maior as $turma)
<p>{{$turma->descricao}}</p>
@endforeach
<h2>Quantidade de Turmas:</h2>
<p>{{$turma_conta}}</p>

@endsection