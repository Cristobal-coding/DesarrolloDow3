<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, AutosController, ArriendosController};

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

Route::get('/autos/{pagina}', [AutosController::class, 'pagina'])->name('autos.paginas');

Route::resource('/arriendos', ArriendosController::class);