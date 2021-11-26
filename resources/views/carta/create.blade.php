@extends('adminlte::page')

@section('title', 'Crear carta')

@section('content_header')
<br>
<br>
@stop

@section('content')

<form action="{{ url('/carta') }}" method="post" enctype="multipart/form-data">

    @csrf

    @include('carta.form',['modo'=>'Crear'])

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