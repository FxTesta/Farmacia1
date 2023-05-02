<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
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
    Route::post('/cliente', 'store')->name('cliente.store');
    Route::get('/editar-cliente/{cliente_id}', 'edit')->name('cliente.edit');
    Route::put('/editar-cliente/{cliente}', 'update')->name('cliente.update');
    Route::delete('/cliente/delete/{cliente}', 'destroy')->name('cliente.destroy');

});