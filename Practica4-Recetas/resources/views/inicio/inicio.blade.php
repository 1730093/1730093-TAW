@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
@endsection

@section('hero')
    <div class="hero-categorias">
        <form class="container h-100"}}>
            <div class="row h-100 align-items-center">
                <div class="col-md-4 texto-buscar">
                    <p class="display-4">Buscar receta</p>

                    <input
                        type="search"
                        name="buscar"
                        class="form-control"
                        placeholder="Buscar Receta"
                    />
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')
    

    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mb-4">Últimas Recetas</h2>
        <div class="row">
            <!--Para iterar las recetas mas recientes--->
            @foreach ($nuevas as $nueva)
            <div class="col-md-4 mt-4"><!--Para mostrar las recetas en forma de cuadricula--->
                <div class="card">
                    <!--Para mostrar la imagen de la receta--->
                    <img src="/storage/{{ $nueva->imagen }}" class="card-img-top" alt="imagen receta" width="100" height="200" >
                    <div class="card-body">
                        <!--Para mostrar el titulo de la receta-->
                        <h3>{{$nueva->titulo}}</h3>
                        <!--Para mostrar un boton que mande a mostrar la receta-->
                        <a href="{{ route('recetas.show', ['receta' => $nueva->id]) }}" class="btn btn-primary d-block font-weight-bold text-uppercase">Mostrar la receta</a>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
        

    </div>



@endsection