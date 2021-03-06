<?php

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

Route::get('/', function () {
    return view('index');
});

/* Rutas Pagina*/
Route::get('/pagina/about');
Route::get('/pagina/areas');
Route::get('/pagina/contact');
Route::get('/pagina/notice');
Route::get('/pagina/pros');

/* Rutas Admin*/
Route::resource('/areas_practicas/configurar_areas_practicas','AreasPracticasController');
Route::resource('/quienes/configurar_quienes','QuienesController');
Route::resource('/noticia/configurar_noticia','NoticiaController');
Route::resource('/prefesional/configurar_prefesional','PrefesionalController');
Route::resource('/contacto/configurar_contacto','ContactoController');