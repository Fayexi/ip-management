<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/ip', [IPController::class, 'store']);
    Route::put('/ip/{ip}', [IPController::class, 'update']);
    Route::get('/audit', [AuditController::class, 'index']);
});
