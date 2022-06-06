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


class ClientesController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request -> get('searchText'));
            $clientes =DB::table('clientes_datos as cd')
            ->orderBy('cd.Identificacion','desc')
            ->paginate(10);


            return view("Clientes.MostrarClientes",["clientes"=>$clientes,"searchText"=>$query]);
        }
    }

    public function create(Request $request)
    {
        if($request)
        {
            $query = trim($request -> get('searchText'));
                $catalogoTipoDireccion =DB::table('catalogo_direcciones as cd')
                ->orderBy('cd.id','asc')
                ->get();

            return view("Clientes.RegistrarCliente",["TiposDirecciones"=>$catalogoTipoDireccion,"searchText"=>$query]);
        }
    }

    public function store(ClientesFormRequest $request)
    {
        try
        {
            DB::beginTransaction();

            $clientes = new Clientes();
            $clientes -> Identificacion = $request -> get('Identificacion');
            $clientes -> Nombre = $request -> get('Nombre');
            $clientes -> Apellido1 = $request -> get('Apellido1');
            $clientes -> Apellido2 = $request -> get('Apellido2');
            $clientes -> CorreoContacto = $request -> get('CorreoContacto');
            $clientes -> Telefono = $request -> get('Telefono');

            $clientes->save();

            $idDireccion = $request->get('Direccion');
            $idTipoDireccion = $request->get('idTipoDireccion');

            $cont = 0;
            while($cont < count($idTipoDireccion))
            {
                $direcciones = new Direcciones();
                $direcciones->Identificacion = $request -> get('Identificacion');
                $direcciones->Direccion = $idDireccion[$cont];
                $direcciones->Tipo_Direccion = $idTipoDireccion[$cont];
                $direcciones->save();
                $cont++;
            }

            DB::commit();
        }catch(\Exception $e)
        {
            DB::rollBack();
        }

        return Redirect::to('Clientes');
    }

    public function edit($Identificacion,Request $request)
    {
        if ($request)
        {
            $clientes = Clientes::findOrFail($Identificacion);
            return view('Clientes.EditarClientes', ["Clientes"=>$clientes]);
        }
    }

    public function update(ClientesEditRequest $request, $Identificacion)
    {
        $clientes = Clientes::findOrFail($Identificacion);
        $clientes -> Nombre = $request -> get('Nombre');
        $clientes -> Apellido1 = $request -> get('Apellido1');
        $clientes -> Apellido2 = $request -> get('Apellido2');
        $clientes -> CorreoContacto = $request -> get('CorreoContacto');
        $clientes -> Telefono = $request -> get('Telefono');

        $clientes-> update();

        return Redirect::to('Clientes');
    }

    public function destroy($Identificacion)
    {
        $clientes=Clientes::where('Identificacion',$Identificacion)->delete();
        $direcciones=Direcciones::where('Identificacion',$Identificacion)->delete();
        return Redirect::to('Clientes');
    }
}
