<?php

namespace Clientes\Http\Controllers;

use Illuminate\Http\Request;

class BotonesController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view("Ejercicios.Botones");
    }
}
