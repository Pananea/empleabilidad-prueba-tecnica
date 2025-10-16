@extends('layouts.app')
@section('title','Vacantes')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Vacantes</h2>
  <a href="{{ route('vacantes.create') }}" class="btn btn-primary">Nueva Vacante</a>
</div>

<form method="GET" class="row g-2 mb-3">
  <div class="col-auto">
    <select name="estado" class="form-select">
      <option value="">-- Filtrar por estado --</option>
      <option value="publicada" {{ request('estado')=='publicada' ? 'selected' : '' }}>Publicada</option>
      <option value="cerrada" {{ request('estado')=='cerrada' ? 'selected' : '' }}>Cerrada</option>
    </select>
  </div>
  <div class="col-auto">
    <button class="btn btn-outline-secondary" type="submit">Filtrar</button>
  </div>
</form>

<table class="table table-striped">
<thead>
<tr><th>Título</th><th>Empresa</th><th>Ciudad</th><th>Salario</th><th>Fecha cierre</th><th>Estado</th><th>Acciones</th></tr>
</thead>
<tbody>
  @forelse($vacantes as $v)
    <tr>
      <td>{{ $v->titulo }}</td>
      <td>{{ $v->empresa->nombre_empresa }}</td>
      <td>{{ $v->ciudad }}</td>
      <td>${{ number_format($v->salario,0,',','.') }}</td>
      <td>{{ $v->fecha_cierre }}</td>
      <td>{{ ucfirst($v->estado) }}</td>
      <td><a class="btn btn-info btn-sm" href="{{ route('vacantes.show', $v) }}">Ver</a></td>
    </tr>
  @empty
    <tr><td colspan="7">No hay vacantes.</td></tr>
  @endforelse
</tbody>
</table>

{{ $vacantes->links() }}
@endsection

