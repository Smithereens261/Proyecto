@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<a href="Camion/create" class="btn btn-secondary mb-3">Crear</a>
<table id="Camiones" class="table table-dark table-striped nt-4 shadow-lg" style="width:100%">
    <thead class="bg-secondary text-white">
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Operando</th>
            <th scope="col">Matricula</th>
            <th scope="col">Choferes</th>
            <th scope="col">Ubicacion</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($camiones as $camion)
        <tr>
            <td>{{$camion->Codigo}}</td>
            <td>
                @if($camion->Operando == 1)
                    Operando
                @else
                    No está operando
                @endif
            </td>
            <td>{{$camion->Matricula}}</td>
            <td>
            @if($camion->chofer)
                {{$camion->chofer->Nombre}} {{$camion->chofer->Apellido_Pat}} {{$camion->chofer->Apellido_Mat}}
            @else
                Sin asignar
            @endif
        </td>
            <td>{{$camion->Ubicacion}}</td>
            <td>
                <form action="/Camion/{{$camion->Codigo}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-secondary" href="/Camion/{{$camion->Codigo}}/edit">Editar</a>
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
        $('#Camiones').DataTable({
            "lengthMenu":[[-1,5,10,50],["All",5,10,50]]
        });
    });
</script>
@stop
