<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/users', function () {
    return User::where('role', 'user')->get();
})->middleware('auth:sanctum')->middleware(AdminMiddleware::class);;

Route::delete('/users/{user}', function (User $user) {
    return $user->delete();
})->middleware('auth:sanctum')->middleware(AdminMiddleware::class);;



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/feedbacks', [FeedbackController::class, 'index']);
    Route::post('/feedbacks', [FeedbackController::class, 'store']);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/maintenances', [MaintenanceController::class, 'index']);
    Route::post('/maintenances', [MaintenanceController::class, 'store']);
    Route::delete('/maintenances/{maintenance}', [MaintenanceController::class, 'destroy'])->middleware(AdminMiddleware::class);
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
