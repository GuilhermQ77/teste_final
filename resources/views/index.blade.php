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
    </div>

    <div class="flex items-center gap-3">
        <div class="flex items-center gap-1">
            <h2 class="text-sm">{{ $publicacao->like ?? 0 }}</h2>
            @auth
            <form action="{{ route('publicacoes.like', $publicacao) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary ml-1">
                    <img src="{{ asset('imagens/icones/flecha_cima_vazia.svg') }}" alt="Curtir" style="width:20px; height:20px;">
                </button>
            </form>
            @else
            <button type="button" onclick="openLoginModal()" class="ml-1">
                <img src="{{ asset('imagens/icones/flecha_cima_vazia.svg') }}" alt="Curtir" style="width:20px; height:20px;">
            </button>
            @endauth
        </div>

        <div class="flex items-center gap-1">
            <h2 class="text-sm">{{ $publicacao->dislike ?? 0 }}</h2>
            @auth
            <form action="{{ route('publicacoes.dislike', $publicacao) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary ml-1">
                    <img src="{{ asset('imagens/icones/flecha_baixo_vazia.svg') }}" alt="Não curtir" style="width:20px; height:20px;">
                </button>
            </form>
            @else
            <button type="button" onclick="openLoginModal()" class="ml-1">
                <img src="{{ asset('imagens/icones/flecha_baixo_vazia.svg') }}" alt="Não curtir" style="width:20px; height:20px;">
            </button>
            @endauth
        </div>

        <div class="flex items-center justify-end pr-2 gap-2">
            <button type="button" onclick="toggleComments(this.dataset.id)" data-id="{{ $publicacao->id }}">
                <img src="{{ asset('imagens/icones/chat.svg') }}" class="w-6 h-6">
            </button>
        </div>

        <div id="comments-{{ $publicacao->id }}" style="display:none" class="col-span-2 mt-2 space-y-2">
            @auth
            <div>
                <strong class="font-semibold mb-1">{{Auth::user()->nome}}:</strong>
                <form action="{{ route('publicacoes.comentar', $publicacao) }}" method="POST" class="flex gap-2">
                    @csrf
                    <input type="text" name="comentario" placeholder="Escreva um comentário..." class="border rounded p-1 flex-1" required>
                    <button type="submit" class="bg-blue-500 text-white px-3 rounded">Comentar</button>
                </form>
            </div>
            @else
            <div class="col-span-2">
                <p>Por favor, <button type="button" onclick="openLoginModal()" class="underline text-blue-600">entre</button> para comentar.</p>
            </div>
            @endauth
        </div>
    </div>
</div>
    @endforeach
    @endsection