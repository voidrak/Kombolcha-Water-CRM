<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\VacancyController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\BillOfficerMiddleware;
use App\Http\Middleware\CustomerServiceExpert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Validation\Rule;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//--------------  Get All  User ------------------------------- //


Route::get('/users', function () {
    return User::where('role', 'user')->latest()->get();
})->middleware('auth:sanctum')->middleware(CustomerServiceExpert::class);;


//--------------  Delete User ------------------------------- //


Route::delete('/users/{user}', function (User $user) {
    return $user->delete();
})->middleware('auth:sanctum')->middleware(CustomerServiceExpert::class);

//--------------  Update User ------------------------------- //

Route::put('/users/{user}', function (User $user, Request $request) {

    $fields = $request->validate([
        'name' => [
            "required",
            "max:255",
            Rule::unique('users')->where(function ($query) use ($user) {
                return $query->where("id", $user->id);
            })->ignore($user->id)
        ],
        'woreda' => 'required|string ',
        'kebele' => 'required|numeric ',
        'house_number' => 'required|numeric ',
    ]);



    $uniqueCombination = User::where('woreda', $fields['woreda'])
        ->where('kebele', $fields['kebele'])
        ->where('house_number', $fields['house_number'])
        ->where('id', '!=', $user->id)
        ->exists();

    if ($uniqueCombination) {
        return response()->json([
            'errors' => [
                'location' => 'This Location has already been taken.',
            ]
        ], 422);
    }

    $user->update($fields);

    return $user;
})->middleware('auth:sanctum')->middleware(CustomerServiceExpert::class);



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
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/bills', [BillController::class, 'index']);
    Route::post('/bills', [BillController::class, 'store'])->middleware(BillOfficerMiddleware::class);
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
