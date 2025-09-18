<?php

use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UtilisateursController;
use App\Http\Controllers\PrestationsController;
use App\Http\Controllers\CoordonneesController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\ClienteleController;
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


// ROUTE PRESTATION

Route::get('/prestation', [PrestationsController::class,  'index']);
Route::post('/prestation', [PrestationsController::class, 'store']);


// ROUTE COORDONNEES

Route::get('/coordonnees', [CoordonneesController::class, 'index']);
Route::post('/coordonnees', [CoordonneesController::class, 'store']);
Route::get('/coordonnees/{id}', [CoordonneesController::class, 'show']);
Route::put('/coordonnees/{id}', [CoordonneesController::class, 'update']);
Route::delete('/coordonnees/{id}', [CoordonneesController::class, 'destroy']);


// ROUTE PERSONNE

Route::get('/personne', [PersonneController::class, 'index']);
Route::post('/personne', [PersonneController::class, 'create']);
Route::get('/personne/{id}', [PersonneController::class, 'show']);
Route::put('/personne/{id}', [PersonneController::class, 'update']);
Route::delete('/personne/{id}', [PersonneController::class, 'destroy']);

// ROUTE CLIENTELE

Route::get('/clientele', [ClienteleController::class, 'index']);
Route::post('/clientele', [ClienteleController::class, 'create']);
Route::get('/clientele/{id}', [ClienteleController::class, 'show']);
Route::put('/clientele/{id}', [ClienteleController::class, 'update']);
Route::delete('/clientele/{id}', [ClienteleController::class, 'destroy']);
