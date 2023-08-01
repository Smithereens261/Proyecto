@extends('adminlte::page')

@section('title', 'Agregar Estación')

@section('content_header')
    <h1>Agregar Estación</h1>
@stop

@section('content')
<form action="{{ route('Estacion.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <!-- Add a hidden input field to submit the 'Codigo' value -->
        <input type="hidden" id="codigo" name="codigo" value="{{ $nextCode }}">
        <label for="codigo">Codigo:</label>
        <input type="text" id="codigo_display" class="form-control" value="{{ $nextCode }}" disabled>
    </div>
    <div class="mb-3">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control">
    </div>
    <div class="mb-3">
        <label for="ubicacion">Ubicacion:</label>
        <input type="text" id="ubicacion" name="ubicacion" class="form-control">
    </div>
    <div class="mb-3">
        <label for="ruta">Ruta:</label>
        <select id="ruta" name="ruta" class="form-control">
            <option value="">Seleccione una ruta</option>
            @foreach($rutas as $ruta)
                <option value="{{ $ruta->Id_ruta }}">{{ $ruta->Nombre }}</option>
            @endforeach
        </select>
    </div>
    <a href="{{ route('Estacion.index') }}" class="btn btn-danger" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-dark" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
