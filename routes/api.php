<?php

use App\Http\Controllers\EntregasController;
use App\Http\Controllers\CategoriasController;
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
    Route::get('/{id}/rotas', [EntregasController::class, 'rotas']);
});

Route::prefix('categorias')->group(function(){
    Route::post('/', [CategoriasController::class, 'store']);
    Route::get('/{id}', [CategoriasController::class, 'show']);
    // Route::resource('categoria', CategoriasController::class)->only([
    //     'store', 'show', 'update', 'destroy'
    // ]);
});
