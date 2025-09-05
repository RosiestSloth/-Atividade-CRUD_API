<?php

// routes/api.php

use App\Http\Controllers\UserController; // Já deve estar aqui
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DistribuidoraController;
use App\Http\Controllers\ProdutoController;

// Rotas Públicas
Route::post('/register', [UserController::class, 'store']); // Rota para registrar
Route::post('/login', [UserController::class, 'login']);   // Rota para logar (apontando para UserController)

// Rotas Protegidas
Route::middleware('auth:sanctum')->group(function () {
    // ... suas rotas de apiResource ...
    Route::apiResource('distribuidoras', DistribuidoraController::class);
    Route::apiResource('categorias', CategoriaController::class);
    Route::apiResource('produtos', ProdutoController::class);
});