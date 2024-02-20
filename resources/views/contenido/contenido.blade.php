@extends('layouts/app')

@section('content')
<div class="container py-4 ">
    <h1>NOTAS!!</h1>
    <div class="py-3 pb-5 ">
       <a href="{{ url('contenido/create')}}" class=" btn btn-dark ">agregar nota</a>
    </div>
    @if (session('message1'))
        <div id="message1" class="alert alert-success ">
            {{ session('message1') }}
        </div>
    @endif

    @if(session('message2'))
        <div id="message2" class="alert alert-success ">
            {{ session('message2') }}
        </div>
    @endif

    @if(session('message3'))
        <div id="message3" class="alert alert-warning ">
            {{ session('message3') }}
        </div>
    @endif

    <div>
        <h2>Notas agregadas</h2>
        <div class="container py-1">

        <form action="{{ url('contenido') }}" method="get">
            <div class="mb-3">
            <label for="perPage">Registro por bloque:</label>
                <select name="perPage" id="perPage" onchange="this.form.submit()">
                    <option value="10" {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ request()->get('perPage') == 20 ? 'selected' : '' }}>20</option>
                    <option value="50" {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div> 
        </form>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>ID</th>
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
                            <td>{{ $contenido->id }}</td>
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
            <div class="d-flex justify-content-center ">
                    {{ $contenidos->links('pagination::bootstrap-5') }}
            </div>
            
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        let mensaje1 = document.getElementById('message1');
        let mensaje2 = document.getElementById('message2');
        let mensaje3 = document.getElementById('message3');

        if(mensaje1){
            setTimeout(function() {
                mensaje1.style.display = 'none';
            }, 5000);
        }else if(mensaje2){
            setTimeout(function() {
                mensaje2.style.display = 'none';
            }, 5000);
        }else if(mensaje3){
            setTimeout(function() {
                mensaje3.style.display = 'none'
            }, 5000);
        }   
    });
</script>
@endsection