@extends('adminlte::page')

@section('title', 'Lista de Recorridos')

@section('content_header')
    <h1>Lista de Recorridos</h1>
@stop

@section('content')
<a href="{{ route('Recorridos.create') }}" class="btn btn-secondary mb-3">Crear Recorrido</a>
<table id="recorridos" class="table table-dark table-striped nt-4 shadow-lg">
    <thead class="bg-secondary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Ruta</th>
            <th scope="col">Camión</th>
            <th scope="col">Hora Inicio</th>
            <th scope="col">Hora Fin</th>
            <th scope="col">Fecha</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($recorridos as $recorrido)
        <tr>
            <td>{{ $recorrido->codigo }}</td>
            <td>{{ $recorrido->Ruta }}</td>
            <td>{{ $recorrido->Camion }}</td>
            <td>{{ $recorrido->Hora_inicio }}</td>
            <td>{{ $recorrido->Hora_fin }}</td>
            <td>{{ $recorrido->Fecha }}</td>
            <td>
                <form action="{{ route('Recorridos.destroy', $recorrido->codigo) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-secondary" href="{{ route('Recorridos.edit', $recorrido->codigo) }}">Editar</a>
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
        $('#recorridos').DataTable({
            "lengthMenu":[[-1,5,10,50],["All",5,10,50]]
        });
    });
</script>
@stop
