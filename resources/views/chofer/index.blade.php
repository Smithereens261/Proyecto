@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<a href="Chofer/create" class="btn btn-secondary mb-3">Crear</a>
<table id="Choferes" class="table table-dark table-striped nt-4 shadow-lg " style="width:100%">
    <thead class="bg-secondary text-white" >
        <tr>
            <th scope='col'>Numero</th>
            <th scope='col'>Nombre</th>
            <th scope='col'>apellido Paterno</th>
            <th scope='col'>apellido Materno</th>
            <th scope='col'>Correo</th>
            <th scope='col'>Contraseñas</th>
            <th scope='col'>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($choferes as $chofer)
        <tr>
            <td>{{$chofer->Numero}}</td>
            <td>{{$chofer->Nombre}}</td>
            <td>{{$chofer->Apellido_Pat}}</td>
            <td>{{$chofer->Apellido_Mat}}</td>
            <td>{{$chofer->Correo}}</td>
            <td >{{$chofer->Contrasena}}</td>
            <td>
                <form action="/Chofer/{{$chofer->Numero}}" method="POST">
                @csrf
                @method('DELETE')
                <a class="btn btn-secondary" href="/Chofer/{{$chofer->Numero}}/edit">Editar</a>
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
        $('#Choferes').DataTable({
            "lengthMenu":[[-1, 5,10,50],["All",5,10,50]]
        })
    })
</script>
@stop
