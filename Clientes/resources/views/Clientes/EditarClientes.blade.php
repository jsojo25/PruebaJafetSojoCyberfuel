@extends('Layouts.Menu')
@section('Contenido')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Editar información de un cliente</h6>
            </div>
            <div class="card-body">
                El formulario que se presenta a continuación permitirá editar la información del
                cliente registrado.
            </div>
        </div>
    </div>


    <div class="container">
        <div class="p-1">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Modificar un cliente</h1>
            </div>
            {!! Form::model($Clientes, ['method' => 'PATCH', 'route' => ['Clientes.update', $Clientes->Identificacion]]) !!}
            {{ Form::token() }}
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="lblcedula">Cedula</label>
                    <input type="number" class="form-control form-control-user" value="{{ $Clientes->Identificacion }}"
                        placeholder="Cedula**" name="Cedula" id="Identificacion" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="lblNombre">Nombre Cliente</label>
                    <input type="text" class="form-control form-control-user" value="{{ $Clientes->Nombre }}"
                        placeholder="Nombre**" name="Nombre" id="Nombre">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="lblApellido1">Apellido 1</label>
                    <input type="text" class="form-control form-control-user" value="{{ $Clientes->Apellido1 }}"
                        placeholder="Primer Apellido**" name="Apellido1" id="Apellido1">
                </div>
                <div class="col-sm-6">
                    <label for="lblApellido2">Apellido 2</label>
                    <input type="text" class="form-control form-control-user" value="{{ $Clientes->Apellido2 }}"
                        placeholder="Segundo Apellido**" name="Apellido2" id="Apellido2">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="lblTelefono">Telefono</label>
                    <input type="number" class="form-control form-control-user" value="{{ $Clientes->Telefono }}"
                        placeholder="Télefono**" name="Telefono" id="Telefono">
                </div>
                <div class="col-sm-6">
                    <label for="lblCorreo">Correo</label>
                    <input type="email" class="form-control form-control-user" value="{{ $Clientes->CorreoContacto }}"
                        placeholder="Correo**" name="CorreoContacto" id="CorreoContacto">
                </div>
            </div>

            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input class="btn btn-info btn-block" type="submit">

            </a>
            <hr>
            {!! Form::close() !!}

        </div>
    </div>

    <hr class="sidebar-divider">

    <!-- Editar Modal-->
    <div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Cliente</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Cliente modificado correctamente.
                </div>
                <div class="modal-footer">

                    <a class="btn btn-success" href="{{ route('Clientes.index') }}">Completar</a>
                </div>
            </div>
        </div>
    </div>
@stop
