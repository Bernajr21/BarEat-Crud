<?php

use App\Http\Controllers\CartaController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view ('auth.login');
});

//El middleware lo que provoca es que no permita sin haber hecho el registro entrar, aunque tengas las URLs
Route::resource('/establecimiento', 'EstablecimientoController')->middleware('auth');

Route::resource('/producto', 'ProductoController')->middleware('auth');

Route::resource('/carta', 'CartaController')->middleware('auth');


Route::prefix(['middleware' => 'auth'], function () {
    Route::get('/', [EstablecimientoController::class, 'index'])->name('home');
});



//Si quisiera eliminar el registro o la recuperación de contraseña+

//Auth::routes(['register'=> false,'reset'=> false]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
