<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', function () {
    return view('login');
});

Route::get('registro', function () {
    return view('registro');
})->name('registro');

Route::get('home', function () {
    return view('layout');
});


// Ventas
Route::get('inicio', 'VentasController@home')->name('home');
Route::get('ver_detalle/{nropedido}', 'VentasController@ver_detalle')->name('detalle');

// Productos
Route::get('lista_productos', 'ProductosController@index')->name('productos.index');
Route::get('editar_producto/{idseq}', 'ProductosController@edit')->name('productos.editar');
Route::post('actualizar_producto', 'ProductosController@update')->name('productos.actualizar');
Route::get('crear_producto', 'ProductosController@create')->name('productos.crear');
Route::post('guardar_producto', 'ProductosController@store')->name('productos.guardar');
Route::get('eliminar_producto/{idproducto}', 'ProductosController@destroy')->name('productos.eliminar');

// Perfil
Route::get('perfil_socio', 'PerfilController@index')->name('perfil.index');
Route::get('cambiar_ubicacion', 'PerfilController@cambiar_ubicacion')->name('perfil.cambiar_ubicacion');
Route::post('actualizar_ubicacion', 'PerfilController@actualizar_ubicacion')->name('perfil.actualizar_ubicacion');


Route::post('login', 'LoginController@login')->name('login');
Route::get('logout', 'LoginController@logout')->name('logout');
