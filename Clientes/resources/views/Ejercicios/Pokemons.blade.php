@extends('Layouts.Menu')
@section('Contenido')

<hr class="sidebar-divider">

<div class="container">

    <div class="p-1">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Pokemones</h1>
        </div>
    </div>

    <h3 class="h5 text-gray-900 mb-4">Abilities:</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Url</th>
            </tr>
        </thead>
        <tbody>
            @for ($i=0;$i<count($pokemons['abilities']);$i++)
                <tr>
                    <th scope="row">{{$pokemons['abilities'][$i]['name']}}</th>
                    <td>{{$pokemons['abilities'][$i]['url']}}</td>
                </tr>
            @endfor
        </tbody>
    </table>
    <br>
    <h3 class="h5 text-gray-900 mb-4">Version Groups:</h3>
    <table class="table">
        <thead class="table-info">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Url</th>
            </tr>
        </thead>
        <tbody>
            @for ($i=0;$i<count($pokemons['version_groups']);$i++)
                <tr>
                    <th scope="row">{{$pokemons['version_groups'][$i]['name']}}</th>
                    <td>{{$pokemons['version_groups'][$i]['url']}}</td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>

@endsection
