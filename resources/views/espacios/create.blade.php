@extends('layout')

@section('contenido')
<div class="container mt-4">
    <h1>Crear Espacio</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('espacios.store') }}" method="POST">
        @csrf
        @include('espacios.partials.form')
    </form>
</div>
@endsection
