@extends('layout')

@section('contenido')
<div class="container mt-4">
    <h1>Editar Espacio</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('espacios.update', $espacio) }}" method="POST">
        @csrf
        @method('PUT')
        @include('espacios.partials.form')
    </form>
</div>
@endsection
