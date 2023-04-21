<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);

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

    Route::get('departments', [DepartmentController::class, 'index']);
    Route::get('departments/{id}', [DepartmentController::class, 'show']);
    Route::post('departments', [DepartmentController::class, 'store']);
    Route::put('departments/{id}', [DepartmentController::class, 'update']);
    Route::delete('departments/{id}', [DepartmentController::class, 'destroy']);
});
