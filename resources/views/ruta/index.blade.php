@extends('adminlte::page')

@section('title', 'Lista de Rutas')

@section('content_header')
    <h1>Lista de Rutas</h1>
@stop

@section('content')
<a href="{{ route('Ruta.create') }}" class="btn btn-secondary mb-3">Crear Ruta</a>
<table id="rutas" class="table table-dark table-striped nt-4 shadow-lg" >
    <thead class="bg-secondary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rutas as $ruta)
        <tr>
            <td>{{ $ruta->Id }}</td>
            <td>{{ $ruta->Nombre }}</td>
            <td>
                <form action="{{ route('Ruta.destroy', $ruta->Id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-secondary" href="{{ route('Ruta.edit', $ruta->Id) }}">Editar</a>
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
        $('#rutas').DataTable({
            "lengthMenu":[[-1,5,10,50],["All",5,10,50]]
        });
    });
</script>
@stop
