@extends('layouts.app')
@section('title','Postulaciones')
@section('content')
<h2>Postulaciones</h2>

<table class="table table-striped">
<thead>
  <tr><th>Participante</th><th>Vacante</th><th>Empresa</th><th>Puntaje</th><th>Estado</th><th>Fecha</th></tr>
</thead>
<tbody>
  @forelse($postulaciones as $p)
    <tr>
      <td>{{ $p->participante->nombres }} {{ $p->participante->apellidos }}</td>
      <td>{{ $p->vacante->titulo }}</td>
      <td>{{ $p->vacante->empresa->nombre_empresa }}</td>
      <td>{{ $p->puntaje }}</td>
      <td>{{ ucfirst($p->estado) }}</td>
      <td>{{ $p->fecha_postulacion }}</td>
    </tr>
  @empty
    <tr><td colspan="6">No hay postulaciones.</td></tr>
  @endforelse
</tbody>
</table>

{{ $postulaciones->links() }}
@endsection

