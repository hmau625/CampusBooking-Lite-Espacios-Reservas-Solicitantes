@extends('layout')

@section('title', 'Reservas')

@section('contenido')
<div class="container mt-4">
    <h1 class="mb-4 fw-bold">Reservas</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <a href="{{ route('reservas.create') }}" class="btn btn-success mb-3">Crear Reserva</a>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Espacio</th>
                    <th>Solicitante</th>
                    <th>Fecha</th>
                    <th>Horario</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->espacio->nombre }}</td>
                    <td>{{ $r->solicitante->nombre }} {{ $r->solicitante->apellido }}</td>
                    <td>{{ $r->fecha }}</td>
                    <td>{{ $r->hora_inicio }} - {{ $r->hora_fin }}</td>
                    <td>{{ $r->estado }}</td>
                    <td class="text-center">
                        <a href="{{ route('reservas.edit', $r) }}" class="btn btn-outline-primary btn-sm me-1">Editar</a>
                        <form action="{{ route('reservas.destroy', $r) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Eliminar esta reserva?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3 d-flex justify-content-center">
        {{ $reservas->links() }}
    </div>
</div>
@endsection
