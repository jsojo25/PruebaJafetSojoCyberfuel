@extends('Layouts.Menu')
@section('Contenido')
    <div class="d-flex flex-row-reverse bd-highlight">
        <a href="{{route('Clientes.create')}}" class="btn btn-info btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Registrar un Cliente</span>
        </a>

    </div>

    <hr class="sidebar-divider">

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-dark">Clientes</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Correo</th>
                                <th>Télefono</th>
                                <th>Editar Cliente</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Correo</th>
                                <th>Télefono</th>
                                <th>Editar Cliente</th>

                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($clientes as $item)

                                <tr>
                                    <td>{{ $item->Identificacion }}</td>
                                    <td>{{ $item->Nombre }} </td>
                                    <td>{{ $item->Apellido1 }}</td>
                                    <td>{{ $item->Apellido2 }}</td>
                                    <td>{{ $item->Telefono }}</td>
                                    <td>{{ $item->CorreoContacto }}</td>
                                    <td>
                                        <a href="{{route('Clientes.edit',$item->Identificacion )}}" class="btn btn-info btn-icon-split">
                                            <span class="text">Editar</span>
                                        </a>
                                        <a href="{{route('Direcciones.edit',$item->Identificacion )}}" class="btn btn-info btn-icon-split">
                                            <span class="text">Direcciones</span>
                                        </a>
                                        <a href="" data-target="#modal-delete-{{$item->Identificacion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                                    </td>
                                </tr>
                                @include('Clientes.EliminarClientes')
                            @endforeach()

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr class="sidebar-divider">
@endsection
