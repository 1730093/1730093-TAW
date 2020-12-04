@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mb-4">Recetas por categoria</h2>
    </div>


    <div class="row">
        @foreach ($recetas as $receta)
        <div class="col-md-4 mt-4"><!--Para mostrar las recetas en forma de cuadricula--->
            <div class="card">
                <!--Para mostrar la imagen de la receta--->
                <img src="/storage/{{ $receta->imagen }}" class="card-img-top" alt="imagen receta" width="100" height="200" >
                <div class="card-body">
                    <!--Para mostrar el titulo de la receta-->
                    <h3>{{$receta->titulo}}</h3>
                    <!--Para mostrar un boton que mande a mostrar la receta-->
                    <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" class="btn btn-primary d-block font-weight-bold text-uppercase">Mostrar la receta</a>
                    </div>
            </div>
        </div>
        @endforeach
    </div>


    <div class="d-flex justify-content-center mt-5">
        {{ $recetas->links() }}
    </div>
@endsection