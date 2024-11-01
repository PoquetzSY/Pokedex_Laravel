<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PokedexController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PokedexController::class, 'showRandomPokemon'])->name('showRandomPokemon');
Route::post('/save', [PokedexController::class, 'pokemonToDB'])->name('pokemonToDB');

Route::get('/saved', [PokedexController::class, 'pokemonInDB'])->name('pokemonInDB');
