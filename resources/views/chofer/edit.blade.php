@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
<form action="/Chofer/{{$chofer->Numero}}" method="POST">
    @csrf
    @method('PUT')
<div class="mb-3">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre" class="form-control" value="{{$chofer->Nombre}}">
  </div>
  <div class="mb-3">
  <!-- Campo Apellido Paterno -->
  <label for="apellido_paterno">Apellido Paterno:</label>
  <input type="text" id="apellido_paterno" name="apellido_paterno" class="form-control" value="{{$chofer->Apellido_Pat}}">
  </div>
  <div class="mb-3">
  <!-- Campo Apellido Materno -->
  <label for="apellido_materno">Apellido Materno:</label>
  <input type="text" id="apellido_materno" name="apellido_materno" class="form-control"value="{{$chofer->Apellido_Mat}}">
  </div>
  <div class="mb-3">
  <!-- Campo Correo -->
  <label for="correo">Correo:</label>
  <input type="email" id="correo" name="correo" class="form-control"value="{{$chofer->Correo}}">
  </div>
  <div class="mb-3">
  <!-- Campo Contraseñas -->
  <label for="contrasena">Contraseña:</label>
  <input type="password" id="contrasena" name="contrasena" class="form-control"value="{{$chofer->Contrasena}}">
  </div>
  <a href="/Chofer" class="btn btn-danger" tabindex="5">Cancel</a>
  <button type="submit" class="btn btn-dark" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop