@extends('layout')

@section('title', 'Editar Solicitante')

@section('contenido')
<div class="container mt-4">
    <h1>Editar Solicitante</h1>

    <form action="{{ route('solicitantes.update', $solicitante) }}" method="POST">
        @csrf
        @method('PUT')
        @include('solicitantes.partials.form')
        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
