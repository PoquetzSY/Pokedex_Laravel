<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pokedex</title>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="w-full h-screen flex items-center justify-center bg-slate-200 dark:bg-[#2b2b2b]">
    <div class="w-11/12 px-20 py-10 rounded-xl bg-gray-300 dark:bg-neutral-800">
        <h1 class="text-3xl text-center capitalize mb-10 text-black dark:text-white">
            {{ $data['name'] }} Nª {{ $data['id'] }}
        </h1>
        <div class="flex gap-10">
            <div class="rounded-xl w-80 h-96 px-10 pt-7 mr-10 bg-white dark:bg-neutral-900">
                <img class="size-64 p-2 bg-slate-200 dark:bg-neutral-800 rounded-md"
                    src="{{ 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' . $data['id'] . '.png' }}">
                alt="">
            </div>
            <div>
                @if (isset($data['types'][1]['type']['name']))
                    <h2 class="text-2xl text-gray-700 dark:text-neutral-300 mb-3">Tipos</h2>
                @else
                    <h2 class="text-2xl text-gray-700 dark:text-neutral-300 mb-3">Tipo</h2>
                @endif
                <div class="flex gap-3">
                    @foreach ($data['types'] as $type)
                        <img class="size-[50px] rounded-full p-2 transition-all {{ $type['type']['name'] }}"
                            src="{{ asset('images/icons/' . $type['type']['name'] . '.svg') }}"
                            alt="{{ $type['type']['name'] }}">
                    @endforeach
                </div>
                <h2 class='text-2xl text-gray-700 dark:text-neutral-300 mt-5'>Altura:</h2>
                <p class='text-lg text-gray-500 dark:text-neutral-300 mb-3'>{{ $data['height'] / 10 }}m</p>

                <h2 class='text-2xl text-gray-700 dark:text-neutral-300'>Peso:</h2>
                <p class='text-lg text-gray-600 dark:text-neutral-300 mb-3'>{{ $data['weight'] / 10 }}kg</p>

                <h2 class="text-2xl text-gray-700 dark:text-neutral-300">Habilidades</h2>
                <ul class="list-disc list-inside">
                    @foreach ($data['abilities'] as $ability)
                        <li class="text-lg text-gray-600 dark:text-neutral-300">
                            {{ $ability['ability']['name'] }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h2 class="mb-5 text-2xl text-gray-700 dark:text-neutral-300">Estadísticas</h2>
                <ul class="text-lg text-gray-600 dark:text-neutral-300">
                    @foreach ($data['stats'] as $stat)
                        <li class="mb-2">
                            {{ $stat['stat']['name'] }}:
                            {{ $stat['base_stat'] }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h2 class='mb-5 text-2xl text-gray-700 dark:text-neutral-300'>Disponible en los juegos:</h2>
                <ul class="grid grid-cols-4 gap-3">
                    @foreach ($data['game_indices'] as $game)
                        <li class="text-lg text-gray-600 dark:text-neutral-300 mb-3">
                            {{ $game['version']['name'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="flex justify-end gap-x-4">
            <form action="{{ route('pokemonToDB') }}" method="POST">
                @csrf
                <input type="hidden" name="name" value="{{ $data['name'] }}">
                <input type="hidden" name="image" value="{{ 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' . $data['id'] . '.png' }}">
                <input type="hidden" name="id_pokedex" value="{{ $data['id'] }}">
                <button type="submit" class="bg-slate-200 dark:bg-[#2b2b2b] border-2 border-gray-500 cursor-pointer transition-all p-5 rounded-full hover:bg-gray-300 hover:dark:bg-neutral-700">
                    <span class="text-black dark:text-white">Guardar en DB</span>
                </button>
            </form>
            <a class="bg-slate-200 dark:bg-[#2b2b2b] border-2 border-gray-500 cursor-pointer transition-all p-5 rounded-full hover:bg-gray-300 hover:dark:bg-neutral-700"
                href="/saved"><span class="text-black dark:text-white">Pokémons en DB</span></a>
            <form action="{{ route('showRandomPokemon') }}" method="GET">
                @csrf
                <button type="submit" class="bg-slate-200 dark:bg-[#2b2b2b] border-2 border-gray-500 cursor-pointer transition-all p-5 rounded-full hover:bg-gray-300 hover:dark:bg-neutral-700">
                    <span class="text-black dark:text-white">Mostrar Pokémon</span>
                </button>
            </form>
        </div>
    </div>
</body>

<script>
    setTimeout(function() {
        window.location.href = "{{ route('showRandomPokemon') }}";
    }, 30000);
</script>


</html>
