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

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/', 'PagesController@dashboard')->name('dashboard');
Route::get('/indicadores', 'PagesController@indicadores')->name('indicadores');
Route::get('/obras_proyectos', 'PagesController@obras_proyectos')->name('obras_proyectos');
Route::get('/presupuestos', 'PagesController@presupuestos')->name('presupuestos');
Route::get('/ordenes_compras', 'PagesController@ordenes_compras')->name('ordenes_compras');
Route::get('/stocks', 'PagesController@stocks')->name('stocks');
Route::get('/clientes', 'PagesController@clientes')->name('clientes');
Route::get('/proveedores', 'PagesController@proveedores')->name('proveedores');
Route::get('/configuraciones', 'PagesController@configuraciones')->name('configuraciones');
