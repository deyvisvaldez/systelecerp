<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('cliente', 'Cliente\ClienteController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('contacto', 'Contacto\ContactoController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('obra', 'Obra\ObraController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('cotizacion', 'Cotizacion\CotizacionController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('presupuesto', 'Presupuesto\PresupuestoController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('proveedor', 'Proveedor\ProveedorController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('proveedor.catalogo', 'Proveedor\ProveedorCatalogoController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::post('importExcel', 'Proveedor\ProveedorCatalogoController@importExcel');