<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, AutosController, ArriendosController,GenerarController, UsuariosController,ClientesController};

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


Route::get('/autos', [AutosController::class, 'index'])->name('autos.index');
Route::post('/autos', [AutosController::class, 'store'])->name('autos.store');
Route::delete('/autos/{auto}', [AutosController::class, 'destroy'])->name('autos.destroy');
Route::get('/autos/{auto}/edit', [AutosController::class, 'edit'])->name('autos.edit');
Route::put('/autos/{auto}', [AutosController::class, 'update'])->name('autos.update');
Route::get('/autos/page/{pagina}', [AutosController::class, 'pagina'])->name('autos.paginas');

Route::resource('/arriendos', ArriendosController::class);
Route::get('/arriendos/create', [ArriendosController::class, 'create'])->name('arriendos.create');

Route::post('/usuarios/login',[UsuariosController::class, 'login'])->name('usuarios.login');
Route::get('/usuarios/logout',[UsuariosController::class, 'logout'])->name('usuarios.logout');
Route::resource('/usuarios', UsuariosController::class);
Route::post('/usuarios/{usuario}/activar', [UsuariosController::class, 'activar'])->name('usuarios.activar');

Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::post('/clientes/create', [ClientesController::class, 'store'])->name('clientes.store');
Route::delete('/cliente/{cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
Route::get('/cliente/{cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClientesController::class, "update"])->name("clientes.update");