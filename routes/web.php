<?php

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/patient/profile', function () {
        if (auth()->user()->role === 'patient') {
            return view('patient.profile'); 
        }
        return redirect('/');
    })->name('patient.profile');

    Route::get('/doctor/profile', function () {
        if (auth()->user()->role === 'doctor') {
            return view('doctor.profile'); 
        }
        return redirect('/');
    })->name('doctor.profile');
});

require __DIR__.'/auth.php';
