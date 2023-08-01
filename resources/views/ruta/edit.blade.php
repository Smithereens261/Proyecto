@extends('adminlte::page')

@section('title', 'Editar Ruta')

@section('content_header')
    <h1>Editar Ruta</h1>
@stop

@section('content')
<form action="{{ route('Ruta.update', $ruta->Id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
    <label for="Id">ID de la Ruta:</label>
    <input type="text" id="Id" name="ID" class="form-control" value="{{ $ruta->Id }}" readonly>
    </div>
    <div class="mb-3">
        <label for="nombre">Nombre de la Ruta:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $ruta->Nombre }}">
    </div>
    <a href="{{ route('Ruta.index') }}" class="btn btn-danger" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-dark" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
