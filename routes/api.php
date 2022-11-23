<?php

use App\Http\Controllers\EntregasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('entregas')->group(function(){
    Route::get('/{id}', [EntregasController::class, 'rotas']);
});

Route::prefix('categorias')->group(function(){
    Route::post('/', [CategoriasController::class, 'store']);
    Route::get('/', [CategoriasController::class, 'index']);
    Route::get('/{id}', [CategoriasController::class, 'show']);
    Route::patch('/{id}', [CategoriasController::class, 'update']);
    Route::delete('/{id}', [CategoriasController::class, 'destroy']);
}); 

Route::prefix('produtos')->group(function(){
    Route::post('/', [ProdutosController::class, 'store']);
    Route::get('/', [ProdutosController::class, 'index']);
    Route::get('/{id}', [ProdutosController::class, 'show']);
    Route::patch('/{id}', [ProdutosController::class, 'update']);
    Route::delete('/{id}', [ProdutosController::class, 'destroy']);
});