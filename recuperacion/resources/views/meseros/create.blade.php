@extends('layouts.app')
<!--Definir la seccion de los estilos del editor trix-->
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
@endsection


@section('botones')
    <a href="{{route ('meseros.index')}}" class="btn btn-primary mr-2" text-white>Volver</a>
@endsection

@section('content')
<h2 class="text-center mb-5">Agregar nuevo mesero</h2>
<!-- Diseñar el formulario para guardar receta -->
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
    <form method="POST" action="{{ route('meseros.store') }}"
        enctype="multipart/form-data" novalidate> <!--Validacion -->
    @csrf

    <div class="form-group">    
    <!--Para el input de nombre-->
        <label for="nombre">Nombre del mesero:</label>
        <input type="text" 
            name="nombre" 
            class="form-control @error('nombre') is-invalid @enderror"
            placeholder="Nombre del mesero"
            value={{old('nombre')}}
            >
            <!--Directiva de Laravel para poner un mensaje de error-->
            @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                <!--Ponemos un mensaje generado por Laravel-->
                <strong>{{$message}}</strong>
            @enderror
            
            @if(Session::has('alertas'))
                       {{ Session::get('alertas') }}
            @endif 

    <!--Para el input de apellidos-->
        <label for="apellidos">Apellidos del mesero:</label>
        <input type="text" 
            name="apellidos" 
            class="form-control @error('apellidos') is-invalid @enderror"
            placeholder="Apellidos del mesero"
            value={{old('apellidos')}}
            >
            <!--Directiva de Laravel para poner un mensaje de error-->
            @error('apellidos')
                <span class="invalid-feedback d-block" role="alert">
                <!--Ponemos un mensaje generado por Laravel-->
                <strong>{{$message}}</strong>
            @enderror
            
            @if(Session::has('alertas'))
                       {{ Session::get('alertas') }}
            @endif 
    <!--Para el input de edad-->
        <label for="edad">Edad:</label>
        <input type="number" 
            name="edad"  min="1" max="90"
            class="form-control @error('edad') is-invalid @enderror"
            placeholder="Edad del mesero"
            value={{old('edad')}}
            >
            <!--Directiva de Laravel para poner un mensaje de error-->
            @error('edad')
                <span class="invalid-feedback d-block" role="alert">
                <!--Ponemos un mensaje generado por Laravel-->
                <strong>{{$message}}</strong>
            @enderror
            
            @if(Session::has('alertas'))
                       {{ Session::get('alertas') }}
            @endif 

            
    <!--Para el input de telefono-->
        <label for="telefono">Numero de telefono:</label>
        <input type="text" 
            name="telefono"
            class="form-control @error('telefono') is-invalid @enderror"
            placeholder="Número telefonico del mesero"
            value={{old('telefono')}}
            >
            <!--Directiva de Laravel para poner un mensaje de error-->
            @error('telefono')
                <span class="invalid-feedback d-block" role="alert">
                <!--Ponemos un mensaje generado por Laravel-->
                <strong>{{$message}}</strong>
            @enderror
            
            @if(Session::has('alertas'))
                       {{ Session::get('alertas') }}
            @endif 

    <!--Para el input de correo-->
        <label for="correo">Correo electronico:</label>
        <input type="text" 
            name="correo"
            class="form-control @error('correo') is-invalid @enderror"
            placeholder="Correo electronico del mesero"
            value={{old('correo')}}
            >
            <!--Directiva de Laravel para poner un mensaje de error-->
            @error('correo')
                <span class="invalid-feedback d-block" role="alert">
                <!--Ponemos un mensaje generado por Laravel-->
                <strong>{{$message}}</strong>
            @enderror
            
            @if(Session::has('alertas'))
                       {{ Session::get('alertas') }}
            @endif 
            
    </div>
    <!--Select de categorias-->
    <div class="form-group">
        <label for='mesa'>Asigne una mesa:</label>
        <select name="mesa"
            class="form-control @error('mesa') is-invalid @enderror" 
            id="mesa">
            <option value="">--Seleccione-</option>
            @foreach($mesas as $id => $mesa)
                <option value="{{$id}}"
                {{ old('categoria') == $id ? 'selected' : ''}}
                
                >{{$mesa}}</option>
            @endforeach
            </select>
            <!--Validacion y mandamos retroalimentacion al usuario-->
        @error('mesa')
        <span class="invalid-feedback d-block" role="alert">
            <!--Ponemos un mensaje de laravel-->
            <strong>{{$message}}</strong>
        @enderror

    </div>
    <!--Final del select-->
   
    <!--Boton-->
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Agregar mesero">
    </div>
    </form>
    </div>
</div>

@endsection

<!---Definir la seccion de los script de editor Trix-->

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous"></script>
@endsection