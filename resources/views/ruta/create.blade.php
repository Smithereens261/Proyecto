@extends('adminlte::page')

@section('title', 'Agregar Ruta')

@section('content_header')
    <h1>Agregar Ruta</h1>
@stop

@section('content')
<form action="{{ route('Ruta.store') }}" method="POST">
    @csrf
    <div class="mb-3">
    <label for="id_ruta">ID de la Ruta:</label>
    <input type="text" id="id_ruta" name="Id" class="form-control" value="{{ $nextId }}" readonly>
    </div>
    <div class="mb-3">
        <label for="nombre">Nombre de la Ruta:</label>
        <input type="text" id="nombre" name="nombre" class="form-control">
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
