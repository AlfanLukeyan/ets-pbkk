<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicalRecordController;
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

Route::resource('/medical-records', MedicalRecordController::class, ['names' => [
    'index' => 'medical-records.index',
    'show' => 'medical-records.show',
    'create' => 'medical-records.create',
    'store' => 'medical-records.store',
    'edit' => 'medical-records.edit',
    'update' => 'medical-records.update',
    'destroy' => 'medical-records.destroy',
]])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
