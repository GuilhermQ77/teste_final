<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex-grow container-none mx-auto border">
        <div class="grid grid-cols-4 w-full min-h-screen">
            <div class="p-6 border">
                <div class="flex flex-col items-center">
                    @auth
                    <img src="{{ Auth::user()->foto }}" class="w-24 h-24 rounded-full mb-4 object-cover">
                    <h2 class="text-xl">{{ Auth::user()->nome }}</h2>
                    @endauth

                    @guest
                    <img src="imagens/logo/logo_sabor_do_brasil.png" class="w-24 h-24 rounded-full mb-4 object-cover">
                    <h2 class="text-xl">Sabor do Brasil</h2>
                    <hr class="mb-4 border-3 border-[#D97014] w-3/4">
                    @endguest
                </div>
            </div>

            <div class=" col-span-2">
                @yield('content')
            </div>

            <div class="p-6 bg-100 border justify-between items-center flex flex-col h-full">
                @auth
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit">Sair</button>
                </form>
                @endauth
                @guest
                <button type="submit">Entrar</button>
                @endguest
            </div>


        </div>

    </div>
    <footer>
        <div class="flex-grow container-none mx-auto border bg-[#D97014] font-bold p-6">
            <div class="grid grid-cols-4 w-full ">

                <div class="flex flex-col items-center text-white">
                    <h2>Sabor do Brasil</h2>

                </div>


                <div class=" col-span-2 flex-col items-center flex">
                   <img src="imagens/icones/Whatsapp.svg" alt="Whatsapp">
                   <img src="" alt="">
                   <img src="" alt="">
                   <img src="" alt="">
                </div>


                <div class="  flex flex-col items-center text-white" >
                    <h3>Copyright-2024</h3>
                </div>


            </div>
        </div>
    </footer>
</body>

</html>