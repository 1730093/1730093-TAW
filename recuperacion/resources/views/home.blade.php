@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2>{{ __('Ver asignacion de meseros-mesas') }}</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row">
                            <!--Para iterar las recetas mas recientes--->
                        @foreach ($meseros as $mesero)

                            <div class="col-md-4 mt-4"><!--Para mostrar las recetas en forma de cuadricula--->
                                <div class="card">
                                    <div class="card-body">
                                    <!--Para mostrar los campos de nombre del mesero y nombre de mesa-->
                                    <h3>Nombre de mesero: {{$mesero->nombre}}</h3>
                                    <h3>Nombre de mesa: {{$mesero->mesa->nombre}}</h3>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection
