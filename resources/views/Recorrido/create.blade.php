@extends('adminlte::page')

@section('title', 'Agregar Recorrido')

@section('content_header')
    <h1>Agregar Recorrido</h1>
@stop

@section('content')
<form action="{{ route('Recorridos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" class="form-control" value="{{ $nextId }}" readonly>
    </div>
    <div class="mb-3">
    <label for="ruta">Ruta:</label>
    <select name="ruta" id="ruta" class="form-control">
            @foreach($rutas as $ruta)
                <option value="{{ $ruta->Id }}" @if($ruta->ruta == $ruta->Id) selected @endif>
                    {{ $ruta->Nombre }}
                </option>
            @endforeach
        </select>
</div>
<div class="mb-3">
    <label for="camion">Camión:</label>
    <select  name="camion" id="camion" class="form-control">
        @foreach($camiones as $camion)
            <option value="{{ $camion->Codigo }}">
                {{ $camion->Matricula }}</option>
        @endforeach
    </select>
</div>
    <div class="mb-3">
        <label for="hora_inicio">Hora Inicio:</label>
        <input type="time" id="hora_inicio" name="hora_inicio" class="form-control">
    </div>
    <div class="mb-3">
        <label for="hora_fin">Hora Fin:</label>
        <input type="time" id="hora_fin" name="hora_fin" class="form-control">
    </div>
    <div class="mb-3">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" class="form-control">
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
