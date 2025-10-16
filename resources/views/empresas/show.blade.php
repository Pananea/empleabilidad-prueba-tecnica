@extends('layouts.app')
@section('title','Detalle Empresa')
@section('content')
<h2>{{ $empresa->nombre_empresa }}</h2>
<ul class="list-group mb-3">
  <li class="list-group-item"><strong>NIT:</strong> {{ $empresa->nit }}</li>
  <li class="list-group-item"><strong>Email:</strong> {{ $empresa->email }}</li>
  <li class="list-group-item"><strong>Teléfono:</strong> {{ $empresa->telefono }}</li>
  <li class="list-group-item"><strong>Ciudad:</strong> {{ $empresa->ciudad }}</li>
  <li class="list-group-item"><strong>Estado:</strong> {{ ucfirst($empresa->estado) }}</li>
</ul>
<h4>Vacantes de la empresa</h4>
@if($vacantes->isEmpty())
  <p>No hay vacantes publicadas.</p>
@else
  <ul class="list-group">
    @foreach($vacantes as $vacante)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <a href="{{ route('vacantes.show', $vacante) }}">{{ $vacante->titulo }}</a>
          <br><small>{{ $vacante->ciudad }} — ${{ number_format($vacante->salario,0,',','.') }}</small>
        </div>
        <span class="badge bg-secondary">{{ ucfirst($vacante->estado) }}</span>
      </li>
    @endforeach
  </ul>
@endif
@endsection

