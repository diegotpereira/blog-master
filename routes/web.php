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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cliente', 'ClienteController@add_cliente_form')->name('cliente.add');
Route::post('/cliente', 'ClienteController@enviar_cliente_dado')->name('cliente.salvar');
Route::get('/cliente/listar', 'ClienteController@buscar_todos_clientes')->name('cliente.listar');
Route::get('/cliente/editar{cliente}', 'ClienteController@editar_cliente_form')->name('cliente.editar');
Route::patch('/cliente/editar{cliente}', 'ClienteController@editar_cliente_form_enviar')->name('cliente.update');
Route::get('/cliente/{cliente}', 'ClienteController@mostrar_unico_cliente')->name('cliente.mostrar');
Route::delete('/cliente/{cliente}', 'ClienteController@deletar_cliente')->name('cliente.delete');


