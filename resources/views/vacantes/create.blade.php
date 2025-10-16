@extends('layouts.app')
@section('title','Crear Vacante')
@section('content')
<h2>Crear Vacante</h2>

<form method="POST" action="{{ route('vacantes.store') }}">
  @csrf

  <div class="mb-3">
    <label class="form-label">Empresa</label>
    <select name="company_id" class="form-select">
      @foreach($empresas as $e)
        <option value="{{ $e->id }}">{{ $e->nombre_empresa }}</option>
      @endforeach
    </select>
    @error('company_id')<div class="text-danger">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Título</label>
    <input name="titulo" class="form-control" value="{{ old('titulo') }}">
    @error('titulo')<div class="text-danger">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Descripción</label>
    <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
    @error('descripcion')<div class="text-danger">{{ $message }}</div>@enderror
  </div>

  <div class="row">
    <div class="col mb-3">
      <label class="form-label">Salario</label>
      <input type="number" name="salario" class="form-control" min="1300000" value="{{ old('salario',1300000) }}">
      @error('salario')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
    <div class="col mb-3">
      <label class="form-label">Ciudad</label>
      <input name="ciudad" class="form-control" value="{{ old('ciudad') }}">
      @error('ciudad')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
  </div>

  <div class="row">
    <div class="col mb-3">
      <label class="form-label">Nivel educativo mínimo</label>
      <select name="nivel_educativo_minimo" class="form-select">
        <option value="bachillerato">Bachillerato</option>
        <option value="técnico">Técnico</option>
        <option value="tecnólogo">Tecnólogo</option>
        <option value="profesional">Profesional</option>
      </select>
      @error('nivel_educativo_minimo')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="col mb-3">
      <label class="form-label">Experiencia mínima (años)</label>
      <input type="number" name="experiencia_minima_anos" class="form-control" min="0" value="{{ old('experiencia_minima_anos',0) }}">
      @error('experiencia_minima_anos')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Número de vacantes</label>
    <input type="number" name="numero_vacantes" class="form-control" min="1" value="{{ old('numero_vacantes',1) }}">
    @error('numero_vacantes')<div class="text-danger">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Fecha de cierre</label>
    <input type="date" name="fecha_cierre" class="form-control" value="{{ old('fecha_cierre') }}">
    @error('fecha_cierre')<div class="text-danger">{{ $message }}</div>@enderror
  </div>

  <button class="btn btn-success" type="submit">Guardar vacante</button>
</form>
@endsection

