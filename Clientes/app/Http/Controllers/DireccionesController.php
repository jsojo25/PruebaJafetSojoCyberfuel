<?php

namespace Clientes\Http\Controllers;

use Illuminate\Http\Request;

use Clientes\Http\Requests;
use Clientes\Models\Clientes;
use Illuminate\Support\Facades\Redirect;
use Clientes\Http\Requests\ClientesFormRequest;
use Clientes\Http\Requests\ClientesEditRequest;
use Clientes\Models\Direcciones;
use Illuminate\Support\Facades\DB;

class DireccionesController extends Controller
{
    public function __construct()
    {

    }

    public function edit($Identificacion,Request $request)
    {
        if($request)
        {
            $query = trim($request -> get('searchText'));
            $direcciones =DB::table('clientes_direcciones')
            ->join('clientes_datos','clientes_direcciones.Identificacion','=','clientes_datos.Identificacion')
            ->join('catalogo_direcciones','catalogo_direcciones.Id','=','clientes_direcciones.Tipo_Direccion')
            ->where("clientes_direcciones.Identificacion","=",$Identificacion)
            ->paginate(10);


            return view("Clientes.DireccionesClientes",["direcciones"=>$direcciones,"searchText"=>$query]);
        }
    }
}
