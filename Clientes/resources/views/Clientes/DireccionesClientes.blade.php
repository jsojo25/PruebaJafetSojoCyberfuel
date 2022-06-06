@extends('Layouts.Menu')
@section('Contenido')


    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-dark">Direcciones del Cliente</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-info">
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Dirección</th>
                                <th>Tipo Dirección</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($direcciones as $item)

                                <tr>
                                    <td>{{ $item->Identificacion }}</td>
                                    <td>{{ $item->Nombre }} </td>
                                    <td>{{ $item->Apellido1 }}</td>
                                    <td>{{ $item->Apellido2 }}</td>
                                    <td>{{ $item->Direccion }}</td>
                                    <td>{{ $item->Tipo_Direccion }}</td>

                                </tr>
                            @endforeach()

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr class="sidebar-divider">
@endsection
