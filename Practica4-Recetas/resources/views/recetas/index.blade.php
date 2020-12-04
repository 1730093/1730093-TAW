@extends('layouts.app')
@section('botones')
    <a href="{{route ('recetas.create')}}" 
    class="btn btn-primary mr-2" text-white>Crear receta</a>
@endsection




@section('content')
<h2 class="text-center mb-5">Administra tus Recetas</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class= "table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col" >Titulo</th>
                    <th scole="col" >Categoria</th>
                    <th scole="col" >Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recetas as $receta)
                <tr>
                    <td>{{ $receta->titulo}}</td>
                    <td> {{$receta->categoria->nombre}} </td>
                    <td>
                        <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" class="btn btn-success d-block mb-2">Ver</a>
                        <a href="{{ route('recetas.edit', ['receta' => $receta->id]) }}" class="btn btn-dark d-block mb-2">Editar</a>
                    <form action="{{ route('recetas.destroy', ['receta' => $receta->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-danger d-block mb-2 w-100" value="Eliminar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection