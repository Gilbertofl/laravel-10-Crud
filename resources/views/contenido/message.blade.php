@extends('layouts/app')

@section('content')
    <section class="container py-4">
        <h2>{{ $msg }}</h2>

        <a href="{{ url('contenido') }}" class="btn btn-secondary ">Ir al inicio</a>
        <a href="{{ url('contenido/create') }}" class="btn btn-dark ">Crear nueva nota</a>
    </section>
@endsection