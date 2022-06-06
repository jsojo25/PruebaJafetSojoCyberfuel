@extends('Layouts.Menu')
@section('Contenido')

<hr class="sidebar-divider">

<div class="container">

    <div class="p-1">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Ejercicio Botones</h1>
        </div>
    </div>

    <button type="button" class="btn btn-outline-info" id="info" onclick="cambiarBoton2()">Boton #1</button>
    <br><br><br>
    <button type="button" class="btn btn-outline-success" id="success" onclick="cambiarBoton1()">Boton #2</button>
</div>

<script>
    function cambiarBoton2()
    {
        if ( $('#success').hasClass('btn btn-outline-success') )
        {
            $('#success').removeClass('btn btn-outline-success');
            $('#success').addClass('btn btn-outline-danger');

            document.getElementById("success").innerHTML = "Cambio de texto y color";
        }
        else
        {
            $('#success').removeClass('btn btn-outline-danger');
            $('#success').addClass('btn btn-outline-success');

            document.getElementById("success").innerHTML = "Boton #2";
        }
    }

    function cambiarBoton1()
    {
        if ( $('#info').hasClass('btn btn-outline-info') )
        {
            $('#info').removeClass('btn btn-outline-info');
            $('#info').addClass('btn btn-outline-dark');

            document.getElementById("info").innerHTML = "Cambio de texto y color";
        }
        else
        {
            $('#info').removeClass('btn btn-outline-dark');
            $('#info').addClass('btn btn-outline-info');

            document.getElementById("info").innerHTML = "Boton #1";
        }
    }
</script>
@endsection
