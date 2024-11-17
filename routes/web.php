<?php


use App\Http\Controllers\LawsuitController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ApartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::resource('clients', ClientController::class);
Route::resource('lawsuits', LawsuitController::class);


Route::resource('apartments', ApartmentController::class);

Route::get('/get-lawsuit-subjects/{type}', [LawsuitController::class, 'getSubjects'])->name('get-lawsuit-subjects');
