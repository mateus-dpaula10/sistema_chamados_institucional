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

Route::view('/', 'pages.login.index')->name('login.index');
Route::post('/auth', 'LoginController@auth')->name('login.auth');
Route::get('/logout', 'LoginController@logout')->name('login.logout');

Route::middleware(['auth'])->group(function(){
    Route::get('/chamados/ti', 'ChamadosController@indexTi')->name('chamados.indexTi');
    Route::get('/chamados/compliance', 'ChamadosController@indexCompliance')->name('chamados.indexCompliance');
    Route::get('/create', 'ChamadosController@create')->name('chamados.create');
    Route::post('/create', 'ChamadosController@store')->name('chamados.store');
    Route::post('/editar_perfil/{id}', 'ChamadosController@editar_perfil')->name('chamados.editar_perfil');
    Route::get('/acompanhamento', 'ChamadosController@acompanhamento')->name('chamados.acompanhamento');
    Route::get('/acompanhamento-colaborador', 'ChamadosController@acompanhamentoColaborador')->name('chamados.acompanhamentoColaborador');
    Route::get('/chamado/excluir/{id}', 'ChamadosController@destroy')->name('chamados.destroy');
    Route::get('/chamado/{id}', 'ChamadosController@show')->name('chamados.show');
    Route::post('/chamado/{id}', 'ChamadosController@update')->name('chamados.update');
});
