<?php

use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UtilisateursController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


//ROUTE D'UTILISATEUR

Route::get('/utilisateur', [UtilisateursController::class,'index']);
Route::post('/utilisateur', [UtilisateursController::class,'store']);
Route::get('/utilisateur/{id}', [UtilisateursController::class, 'show']);
Route::put('/utilisateur/{id}', [UtilisateursController::class, 'update']);
Route::delete('/utilisateur/{id}', [UtilisateursController::class, 'destroy']);

//ROUTE DE SERVICE

Route::get('/service', [ServicesController::class, 'index']);
Route::post('/service', [ServicesController::class, 'store']);
