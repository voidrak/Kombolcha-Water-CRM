<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\VacancyController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CustomerServiceExpert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/users', function () {
    return User::where('role', 'user')->latest()->get();
})->middleware('auth:sanctum')->middleware(CustomerServiceExpert::class);;

Route::delete('/users/{user}', function (User $user) {
    return $user->delete();
})->middleware('auth:sanctum')->middleware(CustomerServiceExpert::class);;



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/feedbacks', [FeedbackController::class, 'index']);
    Route::post('/feedbacks', [FeedbackController::class, 'store']);
    Route::delete('/feedbacks/{feedback}', [FeedbackController::class, 'destroy'])->middleware(AdminMiddleware::class);;
});

Route::get('/vacancies', [VacancyController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/vacancies', [VacancyController::class, 'store'])->middleware(AdminMiddleware::class);
    Route::put('/vacancies/{vacancy}', [VacancyController::class, 'update'])->middleware(AdminMiddleware::class);
    Route::delete('/vacancies/{vacancy}', [VacancyController::class, 'destroy'])->middleware(AdminMiddleware::class);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/maintenances', [MaintenanceController::class, 'index']);
    Route::post('/maintenances', [MaintenanceController::class, 'store']);
    Route::put('/maintenances/{maintenance}', [MaintenanceController::class, 'update']);
    Route::delete('/maintenances/{maintenance}', [MaintenanceController::class, 'destroy'])->middleware(AdminMiddleware::class);
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
