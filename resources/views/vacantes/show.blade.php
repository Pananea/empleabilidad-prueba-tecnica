@extends('layouts.app')
@section('title','Detalle Vacante')
@section('content')
<h2>{{ $vacante->titulo }}</h2>

<p><strong>Empresa:</strong> <a href="{{ route('empresas.show', $vacante->empresa) }}">{{ $vacante->empresa->nombre_empresa }}</a></p>
<p><strong>Ciudad:</strong> {{ $vacante->ciudad }}</p>
<p><strong>Salario:</strong> ${{ number_format($vacante->salario,0,',','.') }}</p>
<p><strong>Fecha de cierre:</strong> {{ $vacante->fecha_cierre }}</p>
<p><strong>Estado:</strong> {{ ucfirst($vacante->estado) }}</p>
<p><strong>Descripción:</strong></p>
<p>{{ $vacante->descripcion }}</p>

<form action="{{ route('postulaciones.store') }}" method="POST" class="mt-3">
  @csrf
  <input type="hidden" name="vacante_id" value="{{ $vacante->id }}">
  <input type="hidden" name="participante_id" value="{{ auth()->id() ?? 1 }}">
  <button type="submit" class="btn btn-primary">Postularme</button>
</form>
@endsection

