@extends('layout')

@section('title', 'Crear Solicitante')

@section('contenido')
<div class="container mt-4">
    <h1>Crear Solicitante</h1>

    <form action="{{ route('solicitantes.store') }}" method="POST">
        @csrf
        @include('solicitantes.partials.form')
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
