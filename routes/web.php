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
    //Register

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    // page Patient 
    Route::get('patient/home', [ProfileController::class, 'showPatientProfile'])->middleware('auth')->name('patient.home');
// Profil du docteur *********
    Route::get('/doctor/doashbord', [ProfileController::class, 'ShowProfileBasedOnRole'])->name('doctor.doashbord');
   // Routes administratives
    Route::get('/admine/profile', [ProfileController::class, 'ShowProfileBasedOnRole'])->name('admin.profile');
    Route::get('/Speciality', [ProfileController::class, 'manageSpeciality'])->name('Speciality');
    Route::get('/Medicament', [ProfileController::class, 'manageMedicament'])->name('Medicament');
    Route::get('/Profile/Edite', [ProfileController::class, 'manageProfile'])->name('Edite.profile');

  

    Route::get('/logout', function () {
        request()->session()->invalidate();
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('/login');
    })->name('logout.perform');
});


require __DIR__.'/auth.php';
