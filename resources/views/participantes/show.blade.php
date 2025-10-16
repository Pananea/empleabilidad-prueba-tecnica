@extends('layouts.app')
@section('title','Detalle Participante')
@section('content')
<h2>{{ $participante->nombres }} {{ $participante->apellidos }}</h2>
<ul class="list-group mb-3">
<li class="list-group-item"><strong>Documento:</strong> {{ $participante->numero_documento }}</li>
<li class="list-group-item"><strong>Email:</strong> {{ $participante->email }}</li>
<li class="list-group-item"><strong>Teléfono:</strong> {{ $participante->telefono }}</li>
<li class="list-group-item"><strong>Ciudad:</strong> {{ $participante->ciudad }}</li>
<li class="list-group-item"><strong>Estado:</strong> {{ ucfirst($participante->estado) }}</li>
</ul>
@endsection

