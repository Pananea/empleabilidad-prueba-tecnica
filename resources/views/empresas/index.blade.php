@extends('layouts.app')
@section('title','Empresas')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Empresas</h2>
  <a href="{{ route('empresas.create') }}" class="btn btn-primary">Nueva Empresa</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>NIT</th><th>Nombre</th><th>Email</th><th>Ciudad</th><th>Estado</th><th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @forelse($empresas as $empresa)
      <tr>
        <td>{{ $empresa->nit }}</td>
        <td>{{ $empresa->nombre_empresa }}</td>
        <td>{{ $empresa->email }}</td>
        <td>{{ $empresa->ciudad }}</td>
        <td>{{ ucfirst($empresa->estado) }}</td>
        <td><a href="{{ route('empresas.show', $empresa) }}" class="btn btn-sm btn-info">Ver</a></td>
      </tr>
    @empty
      <tr><td colspan="6">No hay empresas registradas.</td></tr>
    @endforelse
  </tbody>
</table>

{{ $empresas->links() }}
@endsection

