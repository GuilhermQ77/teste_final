@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')
<h1>Lista de aluno</h1>
<table class="table">
    <thead class="thead-dark">
        <th>Matricula</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Data Nascimento</th>
        <th>Opções</th>

    </thead>
    <tbody>
        @foreach($alunos as $aluno)
        <tr class="table-responsive-xl">
            <td>{{ $aluno->matricula}}</td>
            <td>{{ $aluno->nome}}</td>
            <td>{{ $aluno->email}}</td>
            <td>{{ $aluno->data_nascimento}}</td>

            </td>
            <td><a href="{{ route('aluno.edit',$aluno->id)}}" class="btn btn-success">Editar</a>
                <a href="{{ route('aluno.show',$aluno->id)}}" class="btn btn-primary">Visualizar</a>
                <form action="{{route('aluno.destroy',$aluno->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>

            @endforeach

        </tr>
</table>
<h2>Alunos nascidos em Maio de 2005</h2>
@foreach($aluno_niver as $aluno)
<p>{{$aluno->nome}}</p>
@endforeach

<h2>Alunos com Silva</h2>
@foreach($aluno_name as $aluno)
<p>{{$aluno->nome}}</p>
@endforeach

<h2>Alunos que nasceram antes de 2006</h2>
@foreach($aluno_data as $aluno)
<p>{{$aluno->data_nascimento}}</p>
@endforeach
<h2>Alunos maiores de idade com gmail.com</h2>
@foreach($aluno_datas as $aluno)
<p>{{$aluno->data_nascimento}} {{$aluno->email}}</p>
@endforeach
</tbody>


@endsection