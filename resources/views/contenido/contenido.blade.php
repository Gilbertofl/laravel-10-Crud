@extends('layouts/app')

@section('content')
<div class="container py-4 ">
    <h1>NOTAS!!</h1>
    <div class="py-3 pb-5 ">
       <a href="{{ url('contenido/create')}}" class=" btn btn-dark ">agregar nota</a>
    </div>


    <div>
        <h2>Notas agregadas</h2>
        <div class="container py-1">   
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Nota</th>
                        <th>año</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($contenidos as $contenido)
                        <tr>
                            <td>{{ $contenido->name}}</td>
                            <td>{{ $contenido->note}}</td>
                            <td>{{ $contenido->year }}</td>
                            <td><a href="{{ url('contenido/'.$contenido->id.'/edit') }}"class="btn btn-secondary  btn-sm">Editar</a></td>
                            <td>
                                <form action="{{ url('contenido/'.$contenido->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection