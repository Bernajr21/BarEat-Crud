@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
<br>
<br>
@stop

@section('content')

<form action="{{ url('/producto/'.$producto->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    {{method_field('PATCH')}}

    @include('producto.form',['modo'=>'Editar'])

</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop