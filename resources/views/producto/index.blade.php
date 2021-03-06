@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
<br>
@stop

@section('content')

<div class="container">

    <div class="container">

        <h1>Listado de productos</h1>
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
        @endif



        <table class="table table-light">


            <thead class="thead-light">
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Tipo del producto</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>


            <tbody>
                @foreach( $producto as $producto_one)
                <tr>
                    <td>

                        @if (str_contains($producto_one->ruta_foto_principal, 'https://'))

                        
                    <img class="img-thumbnail img-fluid" src="{{ $producto_one->ruta_foto_principal}}" width="200" alt="">
                        
                    @else
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto_one->ruta_foto_principal}}" width="200" alt="">
                    @endif

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
                @endforeach
            </tbody>


        </table>


        {!! $producto->links() !!}

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