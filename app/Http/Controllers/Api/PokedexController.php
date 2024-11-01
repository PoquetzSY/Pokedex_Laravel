<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pokedex;


class PokedexController extends Controller
{
    public function showRandomPokemon()
    {
        $url = env('URL_API', 'https://pokeapi.co/api/v2/');

        $pokemonID = rand(1, 386);

        $response = Http::get("{$url}pokemon/{$pokemonID}");
        if ($response->failed()) {
            return response()->json(['error' => 'Error on request'], 500);
        } else {
            $data = $response->json();
            return view('welcome', compact('data'));
        }
    }

    public function pokemonToDB(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string',
            'id_pokedex' => 'required|integer',
        ]);


        Pokedex::create([
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'id_pokedex' => $request->input('id_pokedex'),
        ]);

        return redirect()->back()->with('success', 'Pokemon guardado en la base de datos');
    }

    public function pokemonInDB()
    {
        $pokemons = Pokedex::orderBy('id_pokedex')->get();
        return view('saved', compact('pokemons'));
    }
}
