<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\Auth\RegisteredUserController;
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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register'); 
    Route::get('/patient/profile', [ProfileController::class, 'showPatientProfile'])->middleware('auth')->name('patient.profile');
    Route::get('/patient/profile', [ProfileController::class, 'showPatientProfile'])->name('patient.profile')->middleware('auth');
    Route::get('/doctor/profile', function () {
        if (auth()->user()->role === 'doctor') {
            return view('doctor.profile'); 
        }
        return redirect('/');
    })->name('doctor.profile');

    Route::get('/admine/profile', function () {
        if (auth()->user()->role === 'admine') {
            return view('/admine.profile'); 
        }
        return redirect('/');
    })->name('doctor.profile');
    Route::get('/admine/speciality', function () {
        if (auth()->user()->role === 'admine') {
            return view('/admine.géreSpécialiter'); 
        }
        return redirect('/');
    })->name('Spécialitée');

    Route::get('/admine/Médicament', function () {
        if (auth()->user()->role === 'admine') {
            return view('/admine.géreMédicament'); 
        }
        return redirect('/');
    })->name('Médicament');
});

require __DIR__.'/auth.php';
