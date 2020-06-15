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
    return redirect()->route('admin.dash');
});

Route::get('/admin', 'AdminController@dash')->name('admin.dash');
Route::get('/admin/cadastrar/cliente', 'AdminController@cadastrarCliente')->name('admin.cadastrar.cliente');
Route::get('/admin/cadastrar/instrutor', 'AdminController@cadastrarInstrutor')->name('admin.cadastrar.instrutor');
Route::get('/admin/registroPagamento', 'AdminController@registrarPagamento')->name('admin.registro.pagamento');

Route::get('/admin/gerenciar/clientes', 'AdminController@gerenciarClientes')->name('admin.gerenciar.clientes');
Route::get('/admin/gerenciar/instrutores', 'AdminController@gerenciarInstrutores')->name('admin.gerenciar.instrutores');

Route::post('/admin/cliente/salvar/','ClienteController@cadastrar')->name('admin.salvar.cliente');
Route::post('/admin/funcionario/instrutor/salvar/','InstrutorController@cadastrar')->name('admin.salvar.instrutor');

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'LoginController@login')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');
Route::post('/autenticar', 'LoginController@autenticar')->name('login.autenticar');
