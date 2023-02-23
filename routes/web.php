
<?php

use App\Http\Controllers\Controlador;
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

Route::get('/formulario', [Controlador :: class, 'formulario'])->name('route_formulario');


Route::get('/inicio', [Controlador::class, 'inicio'])->name('route_inicio'); 


Route::get('/login',[Controlador :: class, 'login'])->name('route_login');


Route::get('/cadastro',[Controlador ::class, 'cadastro'])->name('route_cadastro');
Route::post('/cadastro-usuario',[Controlador::class,'cadastroUsuario'])->name('cadastro-usuario');


Route::post('/login',[Controlador::class, 'loginUsuario'])->name('login-usuario');
Route::get('/dashboard', [Controlador::class,'dashboard']);

