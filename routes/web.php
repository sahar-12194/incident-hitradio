<?php

use App\Http\Controllers\EntityController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/incidents',                 [IncidentController::class, 'index'])->name('incident.list');
    Route::get('/incident/create',           [IncidentController::class, 'create'])->name('incident.create');
    Route::post('/incident',                 [IncidentController::class, 'store'])->name('incident.store');
    Route::get('/incident/edit/{incident}',  [IncidentController::class, 'edit'])->name('incident.edit');
    Route::put('/incident/update/{incident}', [IncidentController::class, 'update'])->name('incident.update');
    Route::get('/incident/delete/{incident}', [IncidentController::class, 'destroy'])->name('incident.delete');


    // entity

    //Route::get('/entity/create',              [EntityController::class, 'create'])->name('entity.create');
    Route::post('/entity',                    [EntityController::class, 'store'])->name('entity.store');
    Route::get('/entities',                   [EntityController::class, 'index'])->name('entity.list');
    Route::delete('/entity/delete/{id}',      [EntityController::class, 'delete'])->name('entity.delete');
    Route::get('/entity/edit/{id}',           [EntityController::class, 'edit'])->name('entity.edit');
    Route::put('/entity/update/{entity}',     [EntityController::class, 'update'])->name('entity.update');
    // Route::get('/entity/create',           [EntityController::class, 'create'])->name('incident.create');
});


require __DIR__ . '/auth.php';
