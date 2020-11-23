@extends ('layouts.app')



@section('content')    
    <article>

    {{--<h1>{{$receta->categoria}}</h1>--}}
        {{--Para mostrar el titulo de la receta--}}
        <h1>{{$receta->titulo}}</h1>

            <div class="imagen-receta">
                {{--Para mostrar la imagen desde la ruta storage--}}
                <img src="/storage/{{$receta->imagen}}" class="w-50">
            </div>

            <div>
                <p>
                    <span class="font-weight-bold text-primary">Categoria:</span>
                        <a class="text-dark">
                            {{$receta->categoria->nombre}}
                        </a>
                </p>
                <p>
                    <span class="font-weight-bold text-primary">Autor:</span>
                    <a class="text-dark">
                        {{$receta->autor->name}}
                    </a>
                </p>

                <div>
                    <h2 class="my-3 text-primary">Ingredientes:</h2>
                    {!! $receta->ingredientes !!}
                </div>
                <div>
                    <h2 class="my-3 text-primary" center>Preparación:</h2>
                    {!! $receta->preparacion !!}
                </div>
            </div>

    </article>
@endsection
