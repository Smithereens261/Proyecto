@extends('adminlte::page')

@section('title', 'Editar Punto de Ruta')

@section('content_header')
    <h1>Editar Punto de Ruta</h1>
@stop

@section('content')
<form action="{{ url('/Puntosruta/'.$puntoRuta->id) }}" method="post">
    @csrf
    @method('PUT') <!-- Use the PUT method for updates -->
    <div class="mb-3">
        <label for="lat">Lat:</label>
        <input type="text" name="lat" id="lat" value="{{ $puntoRuta->lat }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="long">Long:</label>
        <input type="text" name="long" id="long" value="{{ $puntoRuta->long }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="ruta">Ruta:</label>
        <select name="ruta" id="ruta" class="form-control">
            @foreach($rutas as $ruta)
                <option value="{{ $ruta->Id }}" @if($puntoRuta->ruta == $ruta->Id) selected @endif>
                    {{ $ruta->Nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <a href="{{ url('/Puntosruta') }}" class="btn btn-danger" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-dark" tabindex="4">Guardar</button>
    </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
