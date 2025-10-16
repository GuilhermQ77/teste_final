@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')

<body>
    <h1>Lista de Professor</h1>
    <table class="table">
        <thead class="thead-dark">
            <th scope="col">Nome</th>
            <th scope="col">disciplina</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Opções</th>
        </thead>
        <tbody>
            @foreach($professores as $professor)
            <tr class="table table-bordered">>
                <td>{{ $professor->nome}}</td>
                <td>{{ $professor->disciplina}}</td>
                <td>{{ $professor->ContatoProfessor?->email}}</td>
                <td>{{ $professor->ContatoProfessor?->telefone}}</td>
                <td><a href="{{ route('professor.edit',$professor->id)}}" class="btn btn-outline-success">Editar</a>
                    <a href="{{ route('professor.show',$professor->id)}}" class="btn btn-outline-primary">Visualizar</a>
                    <form action="{{route('professor.destroy',$professor->id)}}" method="post" class="btn btn-outline-danger">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Exlcuir">
                    </form>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
    <h2>Professores João e Silva</h2>
    @foreach($professor_name as $professor)
    <p>{{$professor->nome}}</p>
    @endforeach
</body>
@endsection