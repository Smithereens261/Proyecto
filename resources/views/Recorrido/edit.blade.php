@extends('adminlte::page')

@section('title', 'Editar Recorrido')

@section('content_header')
    <h1>Editar Recorrido</h1>
@stop

@section('content')
<form action="{{ route('Recorridos.update', $recorrido->codigo) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" class="form-control" value="{{ $recorrido->codigo }}" readonly>
    </div>
    <div class="mb-3">
        <label for="ruta">Ruta:</label>
        <select id="ruta" name="ruta" class="form-control">
            @foreach($rutas as $ruta)
                <option value="{{ $ruta->id }}" {{ $recorrido->Ruta == $ruta->id_ruta ? 'selected' : '' }}>{{ $ruta->Nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="camion">Camión:</label>
        <select id="camion" name="camion" class="form-control">
            @foreach($camiones as $camion)
                <option value="{{ $camion->id }}" {{ $recorrido->Camion == $camion->Codigo ? 'selected' : '' }}>{{ $camion->Matricula }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="hora_inicio">Hora Inicio:</label>
        <input type="time" id="hora_inicio" name="hora_inicio" class="form-control" value="{{ $recorrido->Hora_inicio }}">
    </div>
    <div class="mb-3">
        <label for="hora_fin">Hora Fin:</label>
        <input type="time" id="hora_fin" name="hora_fin" class="form-control" value="{{ $recorrido->Hora_fin }}">
    </div>
    <div class="mb-3">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" class="form-control" value="{{ $recorrido->Fecha }}">
    </div>
    <a href="{{ route('Recorridos.index') }}" class="btn btn-danger" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-dark" tabindex="5">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
