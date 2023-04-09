<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ServiceCatalogueController;
use App\Http\Controllers\Api\ServiceLevelAgreementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:api')->group(function () {
    Route::get('/service-catalogues', [ServiceCatalogueController::class, 'index']);
    Route::post('/service-catalogues', [ServiceCatalogueController::class, 'store']);
    Route::get('/service-catalogues/{id}', [ServiceCatalogueController::class, 'show']);
    Route::put('/service-catalogues/{id}', [ServiceCatalogueController::class, 'update']);
    Route::delete('/service-catalogues/{id}', [ServiceCatalogueController::class, 'destroy']);
    
    Route::get('/service-level-agreements', [ServiceLevelAgreementController::class, 'index']);
    Route::post('/service-level-agreements', [ServiceLevelAgreementController::class, 'store']);
    Route::get('/service-level-agreements/{id}', [ServiceLevelAgreementController::class, 'show']);
    Route::put('/service-level-agreements/{id}', [ServiceLevelAgreementController::class, 'update']);
    Route::delete('/service-level-agreements/{id}', [ServiceLevelAgreementController::class, 'destroy']);
});