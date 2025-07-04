<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserProfileController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->middleware('is_admin'); // list all (admin only)
    Route::get('/profile/{id}', [UserProfileController::class, 'show']); // single
    Route::post('/profile', [UserProfileController::class, 'store']);
    Route::put('/profile/{id}', [UserProfileController::class, 'update']);
    Route::delete('/profile/{id}', [UserProfileController::class, 'destroy']);
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
});
