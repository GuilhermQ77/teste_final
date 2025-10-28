@extends('layouts.app')
@section('content')
<div class="text-center border border-[#C2BEBE] border-black ">
    <header>
        <h1 class="text-4xl font-bold ">
            Publicações
        </h1>
    </header>
</div>
@foreach($publicacoes as $publicacao)
<div class="border">

    <h2 class="text-lg font-bold">{{$publicacao->titulo_prato}}</h2>
    <div class="border border-black rounded p-4 mx-1">
        <p class="max-w-full h-auto mx-auto">
            <img src="{{asset($publicacao->foto)}}" class="w-full h-auto rounded">
        </p>
    </div>
    <div class="mt-2 grid grid-cols-2 grid-rows-2 px-2 ">
        <p>{{$publicacao->locals}}</p>
        <p>{{$publicacao->cidade}}</p>
        <div class="mt-2 flex gap-4">
            <div class="flex items-center">
                <p>{{$publicacao->like}}</p>
                <form action="{{ route('like')}}" method="post">
                    @csrf
                    <input type="hidden" name="publicacao_id" value="1">
                    <button type="submit" class="btn btn-primary">
                        <img src="{{ asset('flecha_cima_cheia.svg') }}" alt="Incrementar" style="width:20px; height:20px;">
                    </button>
                </form>
            </div>
            <div class="flex items-center">
                <p>{{$publicacao->dislike}}</p>
                <form action="{{ route('dislike')}}" method="post">
                    @csrf
                    <input type="hidden" name="publicacao_id" value="1">
                    <button type="submit" class="btn btn-primary">
                        <img src="{{ asset('imagens/flecha_cima_cheia.svg') }}" alt="Incrementar" style="width:20px; height:20px;">
                    </button>
                </form>
            </div>

        
        </div>
    </div>
    @endforeach
    @endsection