<?php

use App\Http\Controllers\UtilisateursController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/utilisateur', [UtilisateursController::class,'index']);
Route::post('/utilisateur', [UtilisateursController::class,'store']);
Route::get('/utilisateur/{id}', [UtilisateursController::class, 'show']);
Route::put('/utilisateur/{id}', [UtilisateursController::class, 'update']);
Route::delete('/utilisateur/{id}', [UtilisateursController::class, 'destroy']);
