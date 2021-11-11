@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>BarEat</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h2>Gestiona tu negocio</h2>
        </div>
    </div>

    <div class="card-body">
        <p>Bienvenido al panel de administrador.</p>
    </div>
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