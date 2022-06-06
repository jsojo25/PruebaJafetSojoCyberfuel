<?php

namespace Clientes\Http\Controllers;

use Illuminate\Http\Request;

class JuegoLetrasController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view("Ejercicios.JuegoLetras");
    }
}
