@extends('layouts.app')


@section('botones')
    <a  href="{{ route('mesas.create') }}" class="btn btn-primary mr-2" text-white>Agregar Mesa</a>
@endsection




@section('content')
<h1 class="text-center mb-5">Mesas</h1>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class= "table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col" >Nombre</th>
                    <th scole="col" >Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mesas as $mesa)
                <tr>
                    <td>{{ $mesa->nombre }}</td>
                    <td>
                    <a href="{{ route('mesas.edit', ['mesa' => $mesa->id]) }}" class="btn btn-dark d-block mb-2">Editar</a>
                    <form action="{{ route('mesas.destroy', ['mesa' => $mesa->id]) }}" method="POST">
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