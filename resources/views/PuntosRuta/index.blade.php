@extends('adminlte::page')

@section('title', 'Lista de Puntos de Recorridos')

@section('content_header')
    <h1>Lista de Puntos de Recorridos</h1>
@stop

@section('content')
<a href="{{ route('Puntosruta.create') }}" class="btn btn-secondary mb-3">Agregar Punto</a>
<table id="puntosRecorridos" class="table table-dark table-striped nt-4 shadow-lg">
    <thead class="bg-secondary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Latitud</th>
            <th scope="col">Longitud</th>
            <th scope="col">Ruta</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($puntosRutas as $puntoRuta)
        <tr>
            <td>{{ $puntoRuta->id }}</td>
            <td>{{ $puntoRuta->lat }}</td>
            <td>{{ $puntoRuta->long }}</td>
            <td>{{ $puntoRuta->ruta }}</td>
            <td>
                <form action="{{ route('Puntosruta.destroy', $puntoRuta->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-secondary" href="{{ route('Puntosruta.edit', $puntoRuta->id) }}">Editar</a>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function(){
        $('#puntosRecorridos').DataTable({
            "lengthMenu":[[-1,5,10,50],["All",5,10,50]]
        });
    });
</script>
@stop
