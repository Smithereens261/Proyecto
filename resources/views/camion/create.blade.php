@extends('adminlte::page')

@section('title', 'Agregar Camión')

@section('content_header')
    <h1>Agregar Camión</h1>
@stop

@section('content')
<form action="/Camion" method="POST">
    @csrf
    <div class="mb-3">
        <label for="codigo">Codigo:</label>
        <input type="text" id="codigo" name="codigo" class="form-control">
    </div>
    <div class="mb-3">
        <!-- Campo Operando -->
        <label for="operando">Operando:</label>
        <select id="operando" name="operando" class="form-control">
            <option value="1">Operando</option>
            <option value="0">No operando</option>
        </select>
    </div>
    <div class="mb-3">
        <!-- Campo Matricula -->
        <label for="matricula">Matricula:</label>
        <input type="text" id="matricula" name="matricula" class="form-control">
    </div>
    <div class="mb-3">
        <!-- Campo Choferes -->
        <label for="choferes">Choferes:</label>
        <select id="choferes" name="choferes" class="form-control">
            <option value="">Sin asignar</option>
            @foreach($choferes as $chofer)
                <option value="{{ $chofer->Numero }}">{{ $chofer->Nombre }} {{ $chofer->Apellido_Pat }} {{ $chofer->Apellido_Mat }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <!-- Campo Ubicacion -->
        <label for="ubicacion">Ubicacion:</label>
        <input type="text" id="ubicacion" name="ubicacion" class="form-control">
    </div>
    <a href="/Camion" class="btn btn-danger" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-dark" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
