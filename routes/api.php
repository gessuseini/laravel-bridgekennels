<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DogController;
use App\Http\Controllers\Api\TeamMemberController;
use App\Http\Controllers\Api\BreedingController;
use App\Http\Controllers\Api\FAQController;
use App\Http\Controllers\Api\NewsletterController;
use App\Http\Controllers\Api\SubscriberController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\GlobalSettingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum', 'admin'])
    ->group(function (){
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/settings', [GlobalSettingsController::class, 'index']);
    Route::post('/settings', [GlobalSettingsController::class, 'store']);

    Route::apiResource('/faq', FAQController::class);
    Route::apiResource('/dogs', DogController::class);
    Route::apiResource('/teammembers', TeamMemberController::class);
    Route::apiResource('/breedings', BreedingController::class);
    Route::apiResource('/users', UserController::class);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::apiResource('/newsletters', NewsletterController::class);
    Route::apiResource('/subscribers', SubscriberController::class);

    Route::post('/newsletters/{newsletter}/send', [NewsletterController::class, 'send']);
});

// Public route for subscribing to newsletters
Route::post('/subscribe', [NewsletterController::class, 'subscribe']);

// Public route for logging-in
Route::post('/login', [AuthController::class, 'login']);
