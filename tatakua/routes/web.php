<?php

use App\Http\Controllers\UserController;
use App\Models\Producto;
use App\Models\Torta;
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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/polimor',function (){
    $torta = Torta::find(1);
    echo "Nombre: " . $torta->descripcion ;

    foreach ($torta->getProductos as $producto) {
        echo "</br> Producto: " . $producto;
    }
});

Route::get('/polimor2',function (){//esta es la unica forma de que oneToMany funcione
    $producto = Producto::find(3);
    echo "producto: " . $producto;
    echo "</br>Nombre: " . $producto->producto;
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.delete');
