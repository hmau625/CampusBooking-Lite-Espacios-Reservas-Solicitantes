@extends('layout')

@section('contenido')
<div class="container mt-4">
    <h1 class="mb-4 fw-bold">Lista de Espacios</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <a href="{{ route('espacios.create') }}" class="btn btn-success mb-3">Nuevo Espacio</a>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Capacidad</th>
                    <th>Ubicación</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($espacios as $espacio)
                    <tr>
                        <td>{{ $espacio->id }}</td>
                        <td>{{ $espacio->nombre }}</td>
                        <td>{{ $espacio->tipo }}</td>
                        <td>{{ $espacio->capacidad }}</td>
                        <td>{{ $espacio->ubicacion }}</td>
                        <td class="text-center">
                            <a href="{{ route('espacios.edit', $espacio) }}" class="btn btn-outline-primary btn-sm me-1">Editar</a>
                            <form action="{{ route('espacios.destroy', $espacio) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Eliminar este espacio?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3 d-flex justify-content-center">
        {{ $espacios->links() }}
    </div>
</div>
@endsection