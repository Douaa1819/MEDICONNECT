<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ReservationsController;


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
        Route::get('/patient/Edite', [ProfileController::class, 'manageProfile'])->name('Edite.patient');
        //specialiter Crud:
        Route::get('/Speciality', [SpecialiteController::class, 'Show'])->name('Speciality');
        //add
        Route::post('/Speciality', [SpecialiteController::class, 'store'])->name('specialites.store');
        //Update 
        Route::put('/specialites/update/{id}', [SpecialiteController::class, 'update'])->name('specialites.update');
        //delete
        Route::get('/detet-Spécialiter/{id}', [SpecialiteController::class, 'delete'])->name('delet.spesialiter');
        //show doctors
        Route::get('/specialites/{id}/doctors', [SpecialiteController::class, 'showDoctors'])->name('specialites.doctors');

        //Médicament
        Route::get('/Medicament', [MedicamentController::class, 'index'])->name('Medicament');
        Route::post('/Medicament/Add', [MedicamentController::class, 'store'])->name('Medicament.Add');
        Route::get('/detet/Medicament/{id}', [MedicamentController::class, 'destroy'])->name('delet.Médicament');
        //Update reservation
        Route::get('/user', [ProfileController::class, 'showrecervation'])->name('user.reservation');

        //Update photo Profile :
        Route::post('/user/profile/picture', [ProfileController::class, 'updateProfilePicture'])->name('user.profile.picture.update');
        //Apointment Patient
        Route::get('/patient/Appointment', [ReservationsController::class, 'index'])->name('aptient.appointment');
        Route::put('/patient/Appointment', [ReservationsController::class, 'update'])->name('appointment.update');

        //logout
        Route::get('/logout', function () {
            request()->session()->invalidate();
            \Illuminate\Support\Facades\Auth::logout();
            return redirect('/login');
        })->name('logout.perform');
    });


require __DIR__.'/auth.php';
