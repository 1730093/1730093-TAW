@extends('layouts.app')
<!--Definir la seccion de los estilos del editor trix-->
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
@endsection


@section('botones')
    <a href="{{route ('mesas.index')}}" class="btn btn-primary mr-2" text-white>Volver</a>
@endsection

@section('content')

<h2 class="text-center mb-5">Editar mesa</h2>
<!-- Diseñar el formulario para guardar receta -->
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
    <form method="POST" action="{{ route('mesas.update', ['mesa' => $mesa->id])  }}"
        enctype="multipart/form-data" novalidate> <!--Validacion -->
    @csrf
    @method('PUT')

    <div class="form-group">    
    <!--Para el input de nombre-->
        <label for="mesa">Descripcion de la mesa:</label>
        <input type="text" 
            name="mesa" 
            class="form-control @error('mesa') is-invalid @enderror"
            placeholder="Nombre de la mesa"
            value="{{ $mesa->nombre }}"
            >
            <!--Directiva de Laravel para poner un mensaje de error-->
            @error('mesa')
                <span class="invalid-feedback d-block" role="alert">
                <!--Ponemos un mensaje generado por Laravel-->
                <strong>{{$message}}</strong>
            @enderror
            
            @if(Session::has('alertas'))
            @endif
    <p>

    </p>
    <!--Boton-->
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Actualizar mesa">
    </div>
    </form>
    </div>
</div>

@endsection

<!---Definir la seccion de los script de editor Trix-->

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous"></script>
@endsection