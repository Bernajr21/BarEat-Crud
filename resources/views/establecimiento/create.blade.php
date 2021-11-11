@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
<br>
<br>
@stop

@section('content')
<form action="{{ url('/establecimiento') }}" method="post" enctype="multipart/form-data">

    @csrf

    @include('establecimiento.form',['modo'=>'Crear']);

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