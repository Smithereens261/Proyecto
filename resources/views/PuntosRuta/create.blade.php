@extends('adminlte::page')

@section('title', 'Crear Punto de Ruta')

@section('content_header')
    <h1>Crear Punto de Ruta</h1>
@stop

@section('content')
<form action="{{ url('/Puntosruta') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="lat">Lat:</label>
        <input type="text" id="lat" name="lat" class="form-control">
    </div>
    <div class="form-group">
        <label for="long">Long:</label>
        <input type="text" id="long" name="long" class="form-control">
    </div>
    <div class="form-group">
        <label for="ruta">Ruta:</label>
        <select id="ruta" name="ruta" class="form-control">
            @foreach($rutas as $ruta)
                <option value="{{ $ruta->Id }}">{{ $ruta->Nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-danger">Crear</button>
        <a href="{{ url('/Puntosruta') }}" class="btn btn-dark">Cancelar</a>
    </div>
</form>
@stop
