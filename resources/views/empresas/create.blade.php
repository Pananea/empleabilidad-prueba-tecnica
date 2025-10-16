@extends('layouts.app')
@section('title','Crear Empresa')
@section('content')
<h2>Crear Empresa</h2>
<form method="POST" action="{{ route('empresas.store') }}">
  @csrf
  <div class="mb-3">
    <label class="form-label">NIT</label>
    <input type="text" name="nit" class="form-control" value="{{ old('nit') }}">
    @error('nit')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Nombre empresa</label>
    <input type="text" name="nombre_empresa" class="form-control" value="{{ old('nombre_empresa') }}">
    @error('nombre_empresa')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    @error('email')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Teléfono</label>
    <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
    @error('telefono')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Ciudad</label>
    <input type="text" name="ciudad" class="form-control" value="{{ old('ciudad') }}">
    @error('ciudad')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <button class="btn btn-success" type="submit">Guardar</button>
</form>
@endsection

