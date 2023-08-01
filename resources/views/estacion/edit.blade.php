@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
<form action="{{ route('Estacion.update', $estacion->Codigo) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <!-- Display the current 'Codigo' value as a non-editable field -->
        <label for="codigo">Codigo:</label>
        <input type="text" id="codigo" name="codigo" class="form-control" value="{{ $estacion->Codigo }}" readonly>
    </div>
    <div class="mb-3">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $estacion->Nombre }}">
    </div>
    <div class="mb-3">
        <label for="ubicacion">Ubicacion:</label>
        <input type="text" id="ubicacion" name="ubicacion" class="form-control" value="{{ $estacion->Ubicacion }}">
    </div>
    <div class="mb-3">
        <label for="ruta">Ruta:</label>
        <select id="ruta" name="ruta" class="form-control">
            <option value="">Sin asignar</option>
            @foreach($rutas as $ruta)
                <option value="{{ $ruta->Id_ruta }}" @if($ruta->Id_ruta == $estacion->Ruta) selected @endif>
                    {{ $ruta->Nombre }}
                </option>
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
