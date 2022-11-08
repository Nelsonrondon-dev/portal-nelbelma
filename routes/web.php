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


Auth::routes();

// Route::get('/factura', 'PagoController@update')->name('factura');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/reportes/create', 'ReportesController@create')->middleware('auth');
Route::get('/contactanos', 'HomeController@contanos')->middleware('auth');
Route::get('/descargarPDF', 'PDFController@PDF')->name('descargarPDFUsuarios');
Route::get('/descargarPDFInventario', 'PDFController@PDFInventario')->name('descargarPDFInventario');
Route::get('/descargarPDFPedido/{$id}', 'PDFController@PDFPedido')->name('descargarPDFPedido');

Route::get('/descargarPDFPrecio', 'PDFController@PDFPrecio')->name('descargarPDFPrecio');
Route::get('/reportes', 'ReportesController@index')->middleware('auth');
Route::resource('/usuarios', 'UserController')->middleware('auth');
Route::resource('/inventario', 'InventarioController')->middleware('auth');
Route::resource('/pedido', 'PedidoController')->middleware('auth');
Route::post('ajaxRequest', 'AjaxController@ajaxRequestPost')->name('ajaxRequest.post');
Route::post('ajaxRequestStore', 'AjaxController@ajaxRequestStore')->name('ajaxRequest.store');
Route::post('ajaxRequestReporte', 'AjaxController@ajaxRequestReporte')->name('ajaxRequest.reporte');

Route::resource('/pago', 'PagoController')->middleware('auth');


