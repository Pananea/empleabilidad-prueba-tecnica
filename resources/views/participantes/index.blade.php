@extends('layouts.app')
@section('title','Participantes')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Participantes</h2>
  <a href="{{ route('participantes.create') }}" class="btn btn-primary">Nuevo Participante</a>
</div>

<table class="table table-striped">
<thead>
<tr><th>Documento</th><th>Nombre</th><th>Email</th><th>Ciudad</th><th>Estado</th><th>Acciones</th></tr>
</thead>
<tbody>
@forelse($participantes as $p)
<tr>
  <td>{{ $p->numero_documento }}</td>
  <td>{{ $p->nombres }} {{ $p->apellidos }}</td>
  <td>{{ $p->email }}</td>
  <td>{{ $p->ciudad }}</td>
  <td>{{ ucfirst($p->estado) }}</td>
  <td><a class="btn btn-info btn-sm" href="{{ route('participantes.show', $p) }}">Ver</a></td>
</tr>
@empty
<tr><td colspan="6">No hay participantes.</td></tr>
@endforelse
</tbody>
</table>
{{ $participantes->links() }}
@endsection

