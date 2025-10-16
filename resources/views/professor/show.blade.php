@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')
</head>
<body>
    <h1>Dados do Professor</h1>
    <p>Nome: {{ $professor->nome }}</p>
    <p>Disciplina: {{ $professor->disciplina }}</p>
    <p>Email: {{ $professor->contatoProfessor->email }}</p>
    <p>Telefone: {{ $professor->contatoProfessor->telefone }}</p>
    <img src="{{ asset($professor->foto) }}" alt="" style="max-width: 400px;">
</body>
@endsection