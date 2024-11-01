<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pokémons Guardados</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="w-full h-screen flex justify-center items-center bg-slate-200 dark:bg-[#2b2b2b]">

    @if ($pokemons->isEmpty())
        <div class="flex flex-col items-center">
            <p class="text-xl text-center capitalize mb-10 text-black dark:text-white">No hay Pokémon guardados en la
                base de datos.</p>
            <a class="bg-slate-200 dark:bg-[#2b2b2b] border-2 border-gray-500 cursor-pointer transition-all p-5 rounded-full hover:bg-gray-300 hover:dark:bg-neutral-700"
                href="/"><span class="text-black dark:text-white">Regresar al Inicio</span></a>
        </div>
    @else
        <div class="flex flex-col size-full">
            <div class="flex justify-between items-center px-10">
                <h1 class="text-3xl text-center capitalize my-10 text-black dark:text-white">Pokémon Guardados en la Base de
                    Datos</h1>
                <a class="bg-slate-200 dark:bg-[#2b2b2b] border-2 border-gray-500 cursor-pointer transition-all p-5 rounded-full hover:bg-gray-300 hover:dark:bg-neutral-700"
                    href="/"><span class="text-black dark:text-white">Regresar al Inicio</span></a>
            </div>
            <div class="grid justify-items-center grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-10 p-10">
                @foreach ($pokemons as $pokemon)
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow w-fit">
                        <img src="{{ $pokemon->image }}" alt="{{ $pokemon->name }}"
                            class="size-24 mx-auto rounded-full">
                        <h2 class="text-xl font-semibold text-center my-2 text-black dark:text-white">
                            {{ $pokemon->name }}</h2>
                        <p class="text-center text-gray-400">ID Pokedex: {{ $pokemon->id_pokedex }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</body>

</html>
