<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PruebacomboController;

//hola prueba
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//CLIENTES
Route::controller(ClienteController::class)->middleware('auth')->group(function () {

    Route::get('/cliente', 'index')->name('cliente');
    Route::get('/crear-cliente', 'create')->name('cliente.create');
    Route::post('/cliente', 'store')->name('cliente.store');
    Route::get('/editar-cliente/{cliente_id}', 'edit')->name('cliente.edit');
    Route::put('/editar-cliente/{cliente}', 'update')->name('cliente.update');
    Route::delete('/cliente/delete/{cliente}', 'destroy')->name('cliente.destroy');
});


//Productos
Route::controller(ProductoController::class)->middleware('auth')->group(function () {

    Route::get('/producto', 'index')->name('producto');
    Route::get('/crear-producto', 'create')->name('producto.create');
    Route::post('/producto', 'store')->name('producto.store');
    Route::get('/editar-producto/{producto_id}', 'edit')->name('producto.edit');
    Route::put('/editar-producto/{producto}', 'update')->name('producto.update');
    Route::put('/producto/{productos}', 'updatestock')->name('producto.updatestock');
    Route::delete('/producto/delete/{producto}', 'destroy')->name('producto.destroy');

});


//PROVEEDORES
Route::controller(ProveedorController::class)->middleware('auth')->group(function () {

    Route::get('/proveedor', 'index')->name('proveedor');
    Route::get('/crear-proveedor', 'create')->name('proveedor.create');
    Route::post('/proveedor', 'store')->name('proveedor.store');
    Route::get('/editar-proveedor/{proveedor_id}', 'edit')->name('proveedor.edit');
    Route::put('/editar-proveedor/{proveedor}', 'update')->name('proveedor.update');
    Route::delete('/proveedor/delete/{proveedor}', 'destroy')->name('proveedor.destroy');

});

//COMPRAS
Route::controller(CompraController::class)->middleware('auth')->group(function () {

    Route::get('/compra', 'index')->name('compra');

    Route::get('/proveedores', 'buscarProveedor')->name('buscarproveedor');
    Route::get('/buscarproducto', 'buscarProducto')->name('buscarproducto');
    Route::post('/guardarcompra', 'store')->name('compra.store');
    

});


//PRUEBA COMBOBOX RELLENAR OTROS CAMPOS Y GUARDAR EN BASE DE DATOS

Route::controller(PruebacomboController::class)->middleware('auth')->group(function () {

    Route::get('/prueba', 'index')->name('prueba');

    Route::get('/searchproduct', 'buscarProducto')->name('buscarproducto');

    Route::post('/crearprueba', 'store')->name('prueba.store');


});
