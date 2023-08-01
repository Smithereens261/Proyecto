@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<h2>ADD Choferes</h2>
<form action="/Chofer" method="POST">
    @csrf
<div class="mb-3">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre" class="form-control">
  </div>
  <div class="mb-3">
  <!-- Campo Apellido Paterno -->
  <label for="apellido_paterno">Apellido Paterno:</label>
  <input type="text" id="apellido_paterno" name="apellido_paterno" class="form-control" >
  </div>
  <div class="mb-3">
  <!-- Campo Apellido Materno -->
  <label for="apellido_materno">Apellido Materno:</label>
  <input type="text" id="apellido_materno" name="apellido_materno" class="form-control">
  </div>
  <div class="mb-3">
  <!-- Campo Correo -->
  <label for="correo">Correo:</label>
  <input type="email" id="correo" name="correo" class="form-control">
  </div>
  <div class="mb-3">
  <!-- Campo Contraseñas -->
  <label for="contrasena">Contraseña:</label>
  <input type="password" id="contrasena" name="contrasena" class="form-control">
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