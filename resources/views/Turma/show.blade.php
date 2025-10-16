@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')
<h1>Dados da turma</h1>
<p>Descrição: {{ $turma->descricao}}</p>
<p>Curso:{{$turma->curso->nome}}</p>

@endsection  