<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\ServiceCatalogueController;
use App\Http\Controllers\Api\ServiceLevelAgreementController;
use App\Http\Controllers\Api\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::get('tickets', [TicketController::class, 'index']);
    Route::get('tickets/{id}', [TicketController::class, 'show']);
    Route::post('tickets', [TicketController::class, 'store']);
    Route::put('tickets/{id}', [TicketController::class, 'update']);
    Route::delete('tickets/{id}', [TicketController::class, 'destroy']);

    Route::get('reports', [ReportController::class, 'index']);
    Route::get('reports/{id}', [ReportController::class, 'show']);
    Route::post('reports', [ReportController::class, 'store']);
    Route::put('reports/{id}', [ReportController::class, 'update']);
    Route::delete('reports/{id}', [ReportController::class, 'destroy']);

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

    Route::get('departments', [DepartmentController::class, 'index']);
    Route::get('departments/{id}', [DepartmentController::class, 'show']);
    Route::post('departments', [DepartmentController::class, 'store']);
    Route::put('departments/{id}', [DepartmentController::class, 'update']);
    Route::delete('departments/{id}', [DepartmentController::class, 'destroy']);

    Route::get('customers', [CustomerController::class, 'index']);
    Route::get('customers/{id}', [CustomerController::class, 'show']);
    Route::post('customers', [CustomerController::class, 'store']);
    Route::put('customers/{id}', [CustomerController::class, 'update']);
    Route::delete('customers/{id}', [CustomerController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
