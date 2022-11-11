<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Auth;
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
    return view('client.catalogo');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/register/user', [RegisterController::class, 'registerUser'])->name('register.user');
Route::get('/register/create-default', [RegisterController::class, 'createDefault'])->name('register.default');

Route::get('/roles', [RolController::class, 'index'])->name('roles');
Route::get('/rol/create', [RolController::class, 'create'])->name('rol.create');
Route::post('/rol/store', [RolController::class, 'store'])->name('rol.store');
Route::get('/rol/edit/{id}', [RolController::class, 'edit'])->name('rol.edit');
Route::post('/rol/update/{id}', [RolController::class, 'update'])->name('rol.update');
Route::delete('/rol/delete/{id}', [RolController::class, 'destroy'])->name('rol.delete');
Route::get('/rol/show/{id}', [RolController::class, 'show'])->name('rol.show');

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/user/register', [UserController::class, 'register'])->name('user.register');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');

Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias');
Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoria/store', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/categoria/edit/{id}', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::post('/categoria/update/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/delete/{id}', [CategoriaController::class, 'destroy'])->name('categoria.delete');
Route::get('/categoria/show/{id}', [CategoriaController::class, 'show'])->name('categoria.show');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
Route::get('/producto/create', [ProductoController::class, 'create'])->name('producto.create');
Route::post('/producto/store', [ProductoController::class, 'store'])->name('producto.store');
Route::get('/producto/edit/{id}', [ProductoController::class, 'edit'])->name('producto.edit');
Route::post('/producto/update/{id}', [ProductoController::class, 'update'])->name('producto.update');
Route::delete('/producto/delete/{id}', [ProductoController::class, 'destroy'])->name('producto.delete');
Route::get('/producto/show/{id}', [ProductoController::class, 'show'])->name('producto.show');

Route::get('/ventas', [VentaController::class, 'index'])->name('ventas');
Route::get('/venta/create', [VentaController::class, 'create'])->name('venta.create');
Route::post('/venta/store', [VentaController::class, 'store'])->name('venta.store');
Route::get('/venta/edit/{id}', [VentaController::class, 'edit'])->name('venta.edit');
Route::post('/venta/update/{id}', [VentaController::class, 'update'])->name('venta.update');
Route::delete('/venta/delete/{id}', [VentaController::class, 'destroy'])->name('venta.delete');
Route::get('/venta/show/{id}', [VentaController::class, 'show'])->name('venta.show');

Route::get('/detalleventa/show/{id}', [DetalleVentaController::class, 'show'])->name('detalleventa.show');

Route::get('/ver-carrito', [CarritoController::class, 'show'])->name('ver-carrito');
Route::post('/add-carrito/{id}', [CarritoController::class, 'store'])->name('add-carrito');
Route::delete('/carrito/delete/{id}', [CarritoController::class, 'destroy'])->name('carrito.delete');
Route::get('/carrito/comprar', [CarritoController::class, 'comprar'])->name('carrito.comprar');

/* Usuario */
Route::get('/contactanos', [HomeController::class, 'contactanos'])->name('home.contactanos');
Route::post('/savecontactanos', [HomeController::class, 'savecontactanos'])->name('home.save.contactanos');
Route::get('/integrantes', [HomeController::class, 'integrantes'])->name('home.integrantes');
Route::get('/nosotros', [HomeController::class, 'nosotros'])->name('home.nosotros');

Route::get('/', [TiendaController::class, 'index']);
Route::get('/catalogo/{categoria}', [TiendaController::class, 'index'])->name('catalogo-categoria');
Route::get('/catalogo', [TiendaController::class, 'index'])->name('catalogo');
Route::get('/ver-producto/{id}', [TiendaController::class, 'showProduct'])->name('ver-producto');
Route::get('/inicio', [TiendaController::class, 'index'])->name('inicio');
 
