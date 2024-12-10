<?php


use App\Http\Controllers\LawsuitController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\DocumentController;
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
Route::resource('courts', CourtController::class);
Route::resource('apartments', ApartmentController::class);
Route::resource('financials', FinancialController::class);
Route::resource('documents', DocumentController::class);







Route::get('/get-lawsuit-subjects/{type}', [LawsuitController::class, 'getSubjects'])->name('get-lawsuit-subjects');






Route::get('/clients/list', [ClientController::class, 'list']);

Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
