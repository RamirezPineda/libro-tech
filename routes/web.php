<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\NotaIngresoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\VentaController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TiendaController::class, 'index'])->name('tienda.index');
Route::get('/carrito', [TiendaController::class, 'carrito'])->name('carrito');

Route::post('/venta', [VentaController::class, 'store'])->name('venta.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/generos', GeneroController::class)->except(['show', 'create']);
    Route::resource('/promociones', PromocionController::class)->except(['show', 'create']);;
    Route::resource('/productos', ProductoController::class)->except(['show', 'create']);;

    Route::resource('/personales', PersonalController::class)->except(['show', 'create']);;
    Route::resource('/proveedores', ProveedorController::class)->except(['show', 'create']);;
    Route::resource('/clientes', ClienteController::class)->except(['show', 'create']);;

    Route::resource('/servicios', ServicioController::class)->except(['show', 'create']);;
    Route::resource('/inventarios', InventarioController::class)->except(['show', 'create']);;
    Route::resource('/nota-de-ingresos', NotaIngresoController::class)->except(['show', 'create', 'edit',  'destroy']);;


});

require __DIR__.'/auth.php';
