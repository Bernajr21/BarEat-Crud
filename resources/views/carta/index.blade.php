@extends('adminlte::page')

@section('title', 'Carta')

@section('content_header')
<br>
@stop

@section('content')

<div class="container">

    <div class="container">
        
        

        <h1>Listado de productos de nuestra Carta</h1>
        <a href="{{ url('carta/create')}}" class="btn btn-success">Crear una nueva carta</a>
        <br>
        <br>



        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{Session::get('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
        @endif
        
        
        
        @foreach($establecimiento as $establecimiento_one)
        @if(auth()->user()->id == $establecimiento_one->user_id)

        
            <x-adminlte-card title="{{$establecimiento_one->nombre_establecimiento}}" theme="dark" icon="fas fa-lg fa-utensils">
                <b>Dueño:</b> {{ auth()->user()->name }} <br>
                <b>Email:</b> {{ $establecimiento_one->email }} <br>
                <b>Dirección:</b> {{ $establecimiento_one->dirección_establecimiento }} <br>
            </x-adminlte-card>

            <h3>Nuestros productos en {{$establecimiento_one->nombre_establecimiento}} :</h3>

            @foreach( $cartas as $carta_one)


            @if($establecimiento_one->id == $carta_one->establecimiento_id)

            
            @foreach( $producto as $producto_one)

            @if($carta_one->id == $producto_one->carta_id)
            

                <x-adminlte-card title="{{$producto_one->nombre_producto }}" theme="green" icon="fas fa-lg fa-hamburger">
                    <b>Descripción del Producto:</b> {{$producto_one->descripcion_producto}} <br>
                    <b>Precio:</b> {{ $producto_one->precio_producto }} <br>
                    <b>Tipo de producto:</b> {{ $producto_one->tipo_producto }} <br> <br>
                    <a href="{{ url('/producto/'.$producto_one->id.'/edit') }}" class="btn btn-warning" style="float: left; width: auto;">Editar</a>
                    <form action="{{ url('/producto/'.$producto_one->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input style="float: right; width: auto" class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

                    </form>
                </x-adminlte-card>
            

            @endif
            @endforeach
            <hr>
            @endif
            @endforeach
        @endif
        @endforeach


    </div>

    @stop

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
    <script>
        console.log('Hi!');
    </script>
    @stop