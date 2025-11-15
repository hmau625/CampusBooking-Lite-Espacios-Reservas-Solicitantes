@extends('layout')

@section('title', 'Solicitantes')

@section('contenido')
<div class="container mt-4">
    <h1 class="mb-4 fw-bold">Lista de Solicitantes</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <a href="{{ route('solicitantes.create') }}" class="btn btn-success mb-3">Crear Solicitante</a>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitantes as $solicitante)
                <tr>
                    <td>{{ $solicitante->id }}</td>
                    <td>{{ $solicitante->nombre }}</td>
                    <td>{{ $solicitante->apellido }}</td>
                    <td>{{ $solicitante->email }}</td>
                    <td>{{ $solicitante->telefono }}</td>
                    <td class="text-center">
                        <a href="{{ route('solicitantes.edit', $solicitante->id) }}" class="btn btn-outline-primary btn-sm me-1">Editar</a>
                        <form action="{{ route('solicitantes.destroy', $solicitante->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Eliminar este solicitante?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3 d-flex justify-content-center">
        {{ $solicitantes->links() }}
    </div>
</div>
@endsection
