<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, VehiculosController, ArriendosController,GenerarController, UsuariosController,ClientesController};

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name("home.index");
Route::get('login', [HomeController::class, 'login'])->name('home.login');


Route::get('/vehiculos', [VehiculosController::class, 'index'])->name('vehiculos.index');
Route::post('/vehiculos', [VehiculosController::class, 'store'])->name('vehiculos.store');
Route::delete('/vehiculos/{vehiculo}', [VehiculosController::class, 'destroy'])->name('vehiculos.destroy');
Route::get('/vehiculos/{vehiculo}/edit', [VehiculosController::class, 'edit'])->name('vehiculos.edit');
Route::put('/vehiculos/{vehiculo}', [VehiculosController::class, 'update'])->name('vehiculos.update');
Route::get('/vehiculos/page/{pagina}', [VehiculosController::class, 'pagina'])->name('vehiculos.paginas');

Route::resource('/arriendos', ArriendosController::class);
Route::get('/arriendos/create', [ArriendosController::class, 'create'])->name('arriendos.create');
Route::get('/cart', [ArriendosController::class, 'carrito'])->name('arriendos.carrito');
Route::post('/addcart/{vehiculo}', [ArriendosController::class, 'addCarrito'])->name('arriendos.addCarrito');
Route::delete('/removecart/{vehiculo}', [ArriendosController::class, 'removeCarrito'])->name('arriendos.removecart');

Route::post('/usuarios/login',[UsuariosController::class, 'login'])->name('usuarios.login');
Route::get('/usuarios/logout',[UsuariosController::class, 'logout'])->name('usuarios.logout');
Route::resource('/usuarios', UsuariosController::class);
Route::post('/usuarios/{usuario}/activar', [UsuariosController::class, 'activar'])->name('usuarios.activar');
Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios/create', [UsuariosController::class, 'store'])->name('usuarios.store');

Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::post('/clientes/create', [ClientesController::class, 'store'])->name('clientes.store');
Route::delete('/cliente/{cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
Route::get('/cliente/{cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClientesController::class, "update"])->name("clientes.update");


