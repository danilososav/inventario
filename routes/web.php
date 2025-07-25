<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



use App\Http\Controllers\ProductoController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\MovimientoController;
use App\Models\Marca;

Route::get('/stock', [StockController::class, 'index'])->name('stock.index');

Route::get('/movimiento', [MovimientoController::class, 'index'])->name('movimientos.index');

Route::resource('marcas', MarcaController::class);
Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');


Route::resource('lineas', LineaController::class);
Route::get('/lineas', [LineaController::class, 'index'])->name('lineas.index');
Route::delete('/lineas/{id}', [LineaController::class, 'destroy'])->name('lineas.destroy');

Route::resource('articulos', ArticuloController::class);
Route::get('/articulos', [ArticuloController::class, 'index'])->name('articulos.index');
Route::delete('/articulos/{id}', [ArticuloController::class, 'destroy'])->name('articulos.destroy');




Route::resource('movimientos', MovimientoController::class);
