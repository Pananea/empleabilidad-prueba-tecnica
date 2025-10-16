@extends('layouts.app')
@section('title','Crear Participante')
@section('content')
<h2>Crear Participante</h2>
<form method="POST" action="{{ route('participantes.store') }}">
@csrf
<div class="mb-3">
  <label>Número de documento</label>
  <input name="numero_documento" class="form-control" value="{{ old('numero_documento') }}">
</div>
<div class="mb-3">
  <label>Nombres</label>
  <input name="nombres" class="form-control" value="{{ old('nombres') }}">
</div>
<div class="mb-3">
  <label>Apellidos</label>
  <input name="apellidos" class="form-control" value="{{ old('apellidos') }}">
</div>
<div class="mb-3">
  <label>Email</label>
  <input type="email" name="email" class="form-control" value="{{ old('email') }}">
</div>
<div class="mb-3">
  <label>Teléfono</label>
  <input name="telefono" class="form-control" value="{{ old('telefono') }}">
</div>
<div class="mb-3">
  <label>Ciudad</label>
  <input name="ciudad" class="form-control" value="{{ old('ciudad') }}">
</div>
<button class="btn btn-success" type="submit">Guardar</button>
</form>
@endsection

