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

Route::get('/', 'PaginasController@Inicio');
Route::get('/IniciarSesion', 'PaginasController@IniciarSesion');
Route::get('/Registrarse', 'PaginasController@Registrarse');
Route::get('/VerProgramacion', 'PaginasController@VerProgramacion');

Route::post('/VerProgramacion', 'PaginasController@VerProgramacion');

Route::post('/IniciarSesion', 'CuentasController@Iniciar');
Route::post('/Registrarse', 'CuentasController@Registrar');

Route::get('/Administrador', 'AdministradorController@Menu');
Route::get('/Administrador/CrearServicio', 'AdministradorController@CrearServicio');
Route::get('/Administrador/CrearPaquete', 'AdministradorController@CrearPaquete');
Route::get('/Administrador/CargaCanales', 'AdministradorController@CargaCanales');
Route::get('/Administrador/CargaProgramacion', 'AdministradorController@CargaProgramacion');
Route::get('/Administrador/FacturaUsuario', 'AdministradorController@FacturaUsuario');
Route::get('/Administrador/CambiarPlanes', 'AdministradorController@CambiarPlanes');
Route::get('/Administrador/AdministrarUsuario', 'AdministradorController@AdministrarUsuario');

Route::get('/Suscriptor', 'SuscriptorController@Menu');
Route::get('/Suscriptor/VerFactura', 'SuscriptorController@VerFactura');
Route::get('/Suscriptor/CambiarPaquete', 'SuscriptorController@CambiarPaquete');

Route::post('/Suscriptor/CambiarPaquete', 'SuscriptorController@CambiarPaquete');

Route::post('/Administrador/CrearServicio', 'AdministradorController@CrearServicio');
Route::post('/Administrador/CrearPaquete', 'AdministradorController@CrearPaquete');
Route::post('/Administrador/CargaCanales', 'AdministradorController@CargaCanales');
Route::post('/Administrador/CargaProgramacion', 'AdministradorController@CargaProgramacion');
Route::post('/Administrador/FacturaUsuario', 'AdministradorController@FacturaUsuario');
Route::post('/Administrador/CambiarPlanes', 'AdministradorController@CambiarPlanes');
Route::post('/Administrador/AdministrarUsuario', 'AdministradorController@AdministrarUsuario');

