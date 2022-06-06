@extends('Layouts.Menu')
@section('Contenido')

<hr class="sidebar-divider">

    <div class="container">

        <div class="p-1">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Registar un cliente</h1>
            </div>

            {!!Form::open(array('url'=>'/Clientes','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <form class="user">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="lblcedula">Cedula</label>
                        <input type="text" name="Identificacion" class="form-control form-control-user"
                            id="Identificacion" placeholder="Cédula**" required>

                    </div>
                    <div class="col-sm-6">
                        <label for="lblNombre">Nombre</label>
                        <input type="text" name="Nombre"
                            class="form-control form-control-user" id="Nombre" placeholder="Nombre**" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="lblApellido1">Primer Apellido:</label>
                        <input type="text" name="Apellido1"
                            class="form-control form-control-user" id="Apellido1" placeholder="Primer apellido**"
                            required>
                    </div>
                    <div class="col-sm-6">
                        <label for="lblApellido2">Segundo Apellido:</label>
                        <input type="text" name="Apellido2" class="form-control form-control-user"
                            id="Apellido2" placeholder="Segundo apellido">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="lblCorreo">Correo:</label>
                        <input type="text" name="CorreoContacto" class="form-control form-control-user"
                            id="CorreoContacto" placeholder="Correo**" required>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="lblTelefono">Telefono:</label>
                        <input type="number" name="Telefono"
                            class="form-control form-control-user" id="Telefono" placeholder="Teléfono**" required>
                    </div>
                </div>

                <div class="container p-5 my-5 border">
                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-3">
                            <label for="lblTipoDireccion">Tipo Direccion</label>
                            <select name ="TipoDireccion" id ="TipoDireccion" class="form-control">
                                @foreach ($TiposDirecciones as $TiposDireccion)
                                    <option value="{{$TiposDireccion->Id}}">{{$TiposDireccion->Tipo_Direccion}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-9">
                            <label for="lblDireccion">Dirección</label>
                            <input type="text" name="Direcciones"
                                class="form-control form-control-user" id="Direcciones" placeholder="Direccion**">
                        </div>
                        <div class="col-sm-3">
                            <input  type ="button" value="Agregar" class="btn btn-success" id="btn_add" name="btn_add" onclick="agregar()">
                        </div>
                        <br><br>
                        <div class="col-sm-12">
                            <table class="table" id="direccciones_table">
                                <thead class="table-success">
                                    <tr>
                                        <th scope="col">Opcion</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Direccion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <input name="_token" value="{{csrf_token()}}" hidden/>

                @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <input value="Registrar" class="btn btn-info btn-block" id="enviar" data-toggle="modal" data-target="#clienteModal" style="display: none;">


                </a>
                <hr>
                <!-- Register Modal-->

                <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" id="clienteModal" tabindex="-1">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Registro de Cliente</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">¿ Desea guardar la informacion del cliente ?

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Confirmar</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" id="MensajeError" tabindex="-1">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Faltan Datos por completar</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Se requieren datos en dirección

                            </div>
                        </div>
                    </div>

                </div>



            </form>
            {!!Form::close()!!}
        </div>
    </div>

        <script>
            var total = 0;
            var contador = 0;

            function limpiar()
            {
                $("#Direcciones").val("");
            }

            function evaluar()
            {
                if(total>0)
                {
                    $("#enviar").show();
                }
                else
                {
                    $("#enviar").hide();
                }
            }

            function agregar()
            {
                idTipoDireccion = $("#TipoDireccion").val();
                TipoDireccion = $("#TipoDireccion option:selected").text();
                Direccion = $("#Direcciones").val();

                if(idTipoDireccion!="" && TipoDireccion!="" && Direccion!="")
                {
                    total+=1;
                    var fila = '<tr class="selected" id="fila'+contador+'">'+
                        '<td> <button type="button" class = "btn btn-warning" onclick="eliminar('+contador+');">X</button> </td>'+
                        '<td> <input type="hidden" name="idTipoDireccion[]" value="'+idTipoDireccion+'">'+TipoDireccion+'</td>'+
                        '<td> <input type="text" name="Direccion[]" value="'+Direccion+'"></td>'+
                        '</tr>';

                        contador++;
                    limpiar();
                    evaluar();

                    $("#direccciones_table").append(fila);
                }
                else
                {
                    $('#MensajeError').modal('show');

                }
            }

            function eliminar(index)
            {
                $("#fila"+index).remove();
                total--;
                evaluar();
            }
        </script>

@endsection
