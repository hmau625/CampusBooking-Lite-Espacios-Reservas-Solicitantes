@extends('layout')

@section('title', 'Editar Reserva')

@section('contenido')
<div class="container mt-4">
    <h1>Editar Reserva</h1>

    <form action="{{ route('reservas.update', $reserva) }}" method="POST">
        @csrf
        @method('PUT')
        @include('reservas.partials.form')
        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
