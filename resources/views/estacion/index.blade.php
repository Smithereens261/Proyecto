@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<a href="{{ route('Estacion.create') }}" class="btn btn-secondary mb-3">Crear</a>
<table id="Estaciones" class="table table-dark table-striped nt-4 shadow-lg" style="width:100%">
    <thead class="bg-secondary text-white">
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Ubicacion</th>
            <th scope="col">Ruta</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($estaciones as $estacion)
        <tr>
            <td>{{ $estacion->Codigo }}</td>
            <td>{{ $estacion->Nombre }}</td>
            <td>{{ $estacion->Ubicacion }}</td>
            <td>{{ $estacion->Ruta }}</td>
            <td>
                <form action="{{ route('Estacion.destroy', $estacion->Codigo) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-secondary" href="{{ route('Estacion.edit', $estacion->Codigo) }}">Editar</a>
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
    <!-- Add a custom style for the body to set the black background -->
    <style>
        body {
            background-color: black;
        }
    </style>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function(){
        $('#Estaciones').DataTable({
            "lengthMenu":[[-1,5,10,50],["All",5,10,50]]
        });
    });
</script>
@stop
