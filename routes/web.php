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

Auth::routes();

Route::get('/', 'PagesController@dashboard')->name('dashboard');
Route::get('/indicadores', 'PagesController@indicadores')->name('indicadores');
Route::get('/presupuestos', 'PagesController@presupuestos')->name('presupuestos');
Route::get('/proyectos', 'PagesController@proyectos')->name('proyectos');
Route::get('/ordenes_compras', 'PagesController@ordenes_compras')->name('ordenes_compras');
Route::get('/stocks', 'PagesController@stocks')->name('stocks');
Route::get('/clientes', 'PagesController@clientes')->name('clientes');
Route::get('/proveedores', 'PagesController@proveedores')->name('proveedores');
Route::get('/configuraciones', 'PagesController@configuraciones')->name('configuraciones');

