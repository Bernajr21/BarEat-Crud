@extends('adminlte::page')

@section('title', 'Carta')

@section('content_header')
<br>
@stop

@section('content')

<div class="container">

    <div class="container">
{{-- 
        <h1>Listado de productos de nuestra Carta</h1>
        <a href="{{ url('producto/create')}}" class="btn btn-success">Crear un nuevo producto</a>
        <br>
        <br>



        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{Session::get('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
        @endif --}}


        {{-- <ul>
            @foreach ($cartas as $carta_one)
                <li>{{$carta_one->id}}</li>
            @endforeach
        </ul> --}}

        {{-- <ul>
            @foreach ($producto as $carta_one)
                <li>{{$carta_one->id}}</li>
            @endforeach
        </ul> --}}

        <table class="table table-light">


            <thead class="thead-light">
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Tipo del producto</th>
                    <th></th>
                </tr>
            </thead>


            <tbody>
                @foreach( $producto as $producto_one)
                @foreach( $cartas as $carta_one)
                @if($producto_one->carta_id == $carta_one->establecimiento_id)
                <tr>
                    <td>

                        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto_one->ruta_foto_principal}}" width="200" alt="">

                    </td>
                    <td>{{ $producto_one->nombre_producto }}</td>
                    <td>{{ $producto_one->descripcion_producto}}</td>
                    <td>{{ $producto_one->precio_producto }}€</td>
                    <td>{{ $producto_one->tipo_producto }}</td>
                    <td>
                        <a href="{{ url('/producto/'.$producto_one->id.'/edit') }}" class="btn btn-warning">Editar</a>
                    </td>
                    <td>
                        <form action="{{ url('/producto/'.$producto_one->id) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

                        </form>

                    </td>
                </tr>
                @endif
                @endforeach
                @endforeach
            </tbody>


        </table>


       

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