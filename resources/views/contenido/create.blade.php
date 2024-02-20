@extends('layouts/app')

@section('content')

    <section class=" container py-4">
        <h1>Crea una nueva nota</h1>

        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ url('contenido') }}" method="post">
        @csrf
        
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label ">Nombre</label>   
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name')}}" placeholder="Agrega un nombre" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="note" class="col-sm-2 col-form-label ">Nota</label>   
                <div class="col-sm-7">
                    <textarea type="text" class="form-control" name="note" id="note" placeholder="Escribe la nota" cols="30" rows="10" required>{{ trim(old('note'))}}</textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="year" class="col-sm-2 col-form-label ">Año de la nota</label>   
                <div class="col-sm-7">
                    <input type="number" class="form-control" name="year" id="year" min="1900" max="2500" value="{{ old('year')}}" placeholder="Agrega el año" required>
                </div>
            </div>

            <a href="{{ url('contenido') }}" class="btn btn-danger ">
                Cancelar
            </a>
            
            <button type="submit" class="btn btn-success">Guardar</button>

         </form>

    </section>

@endsection