<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//ESTABLECIMIENTOS
Route::apiResource('establecimientos', 'EstablecimientoController', ['only'=>['index', 'show', 'update', 'destroy']]);
Route::apiResource('establecimiento.imagenes', 'EstablecimientoImagenController', ['except'=>['update']]);
Route::apiResource('establecimiento.puntuaciones', 'EstablecimientoPuntuacionController', ['only'=>['index', 'show']]);
Route::apiResource('establecimiento.productos', 'EstablecimientoProductoController', ['except'=>['update']]);
Route::apiResource('establecimiento.reservas', 'EstablecimientoReservaController', ['only'=>['index']]);
Route::apiResource('establecimiento.carta', 'EstablecimientoCartaController', ['only'=>['store']]);

//CARTA
Route::apiResource('carta', 'CartaController', ['only'=>['show']]);

//USUARIOS
Route::apiResource('usuarios', 'UserController', ['except'=>['index']]);
Route::post('login', 'UserController@login');
Route::apiResource('usuarios.tipos', 'UserTipoController', ['only'=>['index']]);
Route::apiResource('usuario.establecimiento.reserva', 'UserEstablecimientoReservaController', ['only'=>['store']]);
Route::apiResource('usuario.establecimiento', 'UserEstablecimientoController', ['only'=>['store']]);
Route::apiResource('usuario.establecimiento.puntuacion', 'UserPuntuacionEstablecimientoController', ['only'=>['index','store']]);
Route::apiResource('usuario.producto.puntuacion', 'UserPuntuacionProductoController', ['only'=>['index','store']]);
Route::apiResource('usuario.reservas', 'UserReservaController', ['only'=>['index', 'destroy']]);


//PRODUCTOS
Route::apiResource('producto', 'ProductoController', ['only'=>['update']]);
Route::apiResource('producto.puntuaciones', 'ProductoPuntuacionController', ['only'=>['index', 'show']]);

//PUNTUACIONES USUARIO - ESTABLECIMIENTOS
Route::apiResource('usuario.puntuaciones_establecimientos', 'UsuarioPuntuacionesEstablecimietos', ['only'=>['index']]);

//PUNTUACIONES USUARIOS - PRODUCTOS
Route::apiResource('usuario.puntuaciones_productos', 'UsuarioPuntuacionesProductos', ['only'=>['index']]);

//PUNTUACIONES ESTABLECIMIENTOS
Route::apiResource('puntuaciones_establecimientos', 'PuntuacionesEstablecimientosController', ['only'=>['update', 'destroy']]);

//PUNTUACIONES PRODUCTOS
Route::apiResource('puntuaciones_productos', 'PuntuacionesProductosController', ['only'=>['update', 'destroy']]);













