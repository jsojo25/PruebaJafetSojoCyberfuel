<?php

namespace Clientes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonsController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $respuesta = Http::get('https://pokeapi.co/api/v2/generation/7/');

        $pokemons = $respuesta -> json();

        return view("Ejercicios.Pokemons", compact('pokemons'));
    }
}
