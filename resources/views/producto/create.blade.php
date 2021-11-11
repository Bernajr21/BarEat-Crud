@extends('adminlte::page')

@section('title', 'Crear producto')

@section('content_header')
<br>
<br>
@stop

@section('content')

<form action="{{ url('/producto') }}" method="post" enctype="multipart/form-data">

    @csrf

    @include('producto.form',['modo'=>'Crear'])

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