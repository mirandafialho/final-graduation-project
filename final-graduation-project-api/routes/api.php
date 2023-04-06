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
    Route::get('/service-level-agreements', [ServiceLevelAgreementController::class, 'index']);
});