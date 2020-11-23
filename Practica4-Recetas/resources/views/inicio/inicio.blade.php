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

        <div class="owl-carousel owl-theme">
            
                <div class="card ">

                    <div class="card-body h-100">
                     
                        <a class="btn btn-primary d-block font-weight-bold text-uppercase"
                        >Ver Receta</a>
                    
                    </div><  
                </div>
        </div>
    </div>

    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Recetas más Votadas</h2>
        
    </div>

@endsection