@extends('layout')

@section('title', 'Crear Reserva')

@section('contenido')
<div class="container mt-4">
    <h1>Crear Reserva</h1>

    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf
        @include('reservas.partials.form')
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
