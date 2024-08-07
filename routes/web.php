<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('check.lock')->group(function () {
    Route::get('/', [\App\Http\Controllers\DogController::class, 'latestDogs'])->name('home');
    Route::get('/our-services', function () {
        return view('our-services');
    });

    Route::get('/dog/{dog:dog_slug}', [\App\Http\Controllers\DogController::class, 'view'])->name('dog.view');

    Route::get('/our-dogs', [\App\Http\Controllers\DogController::class, 'index']);
    Route::get('/filter-dogs', [\App\Http\Controllers\DogController::class, 'filterDogs']);

    Route::get('/puppies-breedings', [\App\Http\Controllers\DogController::class, 'pindex']);
    Route::get('/filter-puppies', [\App\Http\Controllers\DogController::class, 'filterPuppies']);

    Route::get('/request-dog/{id}', [\App\Http\Controllers\DogController::class, 'showRequestForm'])->name('request-dog');
    Route::post('/request-dog', [\App\Http\Controllers\DogController::class, 'sendRequest'])->name('send-request');


    Route::get('/about-us', function () {
        return view('about-us');
    });

    Route::get('/contact-us', function () {
        return view('contact-us');
    });

    Route::get('/our-team', [\App\Http\Controllers\TeamMemberController::class, 'index']);

    Route::get('/thankyou', function () {
        return view('thankyou');
    })->name('thankyou');

    Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');

});

Route::get('/lock-page/{key}', [\App\Http\Controllers\LockController::class, 'toggleLock'])
    ->name('toggle.lock');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile', [ProfileController::class, 'updatePhone'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
        return view('dashboard.main');
    })->name('dashboard');


});

require __DIR__.'/auth.php';
