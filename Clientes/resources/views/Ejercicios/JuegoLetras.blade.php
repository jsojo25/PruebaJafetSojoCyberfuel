@extends('Layouts.Menu')
@section('Contenido')

<hr class="sidebar-divider">

<div class="container">

    <div class="p-1">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Juego de letras</h1>
        </div>
    </div>

    <div class="form-group">
        <label for="txt">Ingrese un texto:</label>
        <input type="text" class="form-control" id="txt">
        <br>
        <button type="button" class="btn btn-outline-info" id="info" onclick="JuegoDeLetras()">Procesar</button>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="txt2" hidden="true">
        <br>
        <input type="text" class="form-control" id="txt3" hidden="true">
    </div>
</div>

<script>

    function JuegoDeLetras()
    {
        document.getElementById("txt2").hidden = false;
        document.getElementById("txt3").hidden = false;

        cadenaTexto = document.getElementById("txt").value.toLowerCase();
        cadenaTexto2 = "";

        Texto = cadenaTexto.split('');
        Mayuscula=1;

        Texto.forEach(element => {
            if(element==" ")
            {
                cadenaTexto2 += element;
            }
            else
            {
                if(Mayuscula==1)
                {
                    cadenaTexto2 += element.toUpperCase();
                    Mayuscula=0;
                }
                else
                {
                    cadenaTexto2 += element.toLowerCase();
                    Mayuscula=1;
                }
            }
        });

        /*cadenaTexto = cadenaTexto.toLowerCase().split('').map((word, index) => {
            if (index % 2 === 0) {
                return word.toUpperCase()
            }
            return word
        }).join('')*/

        document.getElementById("txt2").value = cadenaTexto2;
        document.getElementById("txt3").value = "Longitud del texto: "+cadenaTexto.length;
    }

</script>
@endsection
