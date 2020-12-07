@extends('layouts.app')


@section('botones')
    <a  href="{{ route('meseros.create') }}" class="btn btn-primary mr-2" text-white>Agregar Mesero</a>
@endsection




@section('content')
<h1 class="text-center mb-5">Meseros</h1>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class= "table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col" >Nombre</th>
                    <th scole="col" >Edad</th>
                    <th scole="col" >Telefono</th>
                    <th scole="col" >Correo</th>
                    <th scole="col" >Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($meseros as $mesero)

                <tr>
                <td>{{$mesero->nombre}} {{ $mesero->apellidos}}</td>
                <td>{{$mesero->edad}}</td>
                <td>{{$mesero->telefono}}</td>
                <td>{{$mesero->correo}}</td>


                    <td>
                    <a href="{{route('meseros.edit', ['mesero' => $mesero->id])}}" class="btn btn-dark d-block mb-2">Editar</a>
                    <form action="{{ route('meseros.destroy', ['mesero' => $mesero->id]) }}" method="POST">
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