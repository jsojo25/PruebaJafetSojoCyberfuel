<?php

namespace Clientes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {

            $clientes = DB::table('clientes_datos')
            ->join('clientes_direcciones','clientes_datos.Identificacion','=','clientes_direcciones.Identificacion')
            ->get();


            return response()->json(['success' => true, 'clientes' => $clientes], 200);
        }
    }
}
