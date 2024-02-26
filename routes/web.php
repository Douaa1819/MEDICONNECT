<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\NoteControlle;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\ConsultationController;



    Route::get('/', function () {
        return view('auth/login');
    });


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
        Route::get('patient/home', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('patient/home', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('patient/home', [ProfileController::class, 'destroy'])->name('profile.destroy');

        //_____________________________________Register_______________________________________________//

        Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
          //_____________________________________ Profil du docteur_____________________________________//
          Route::get('/doctor/doashbord', [ProfileController::class, 'ShowProfileBasedOnRole'])->name('doctor.doashbord');
          Route::get('/admine/profile', [ProfileController::class, 'ShowProfileBasedOnRole'])->name('admin.profile');
          Route::get('patient/home', [ProfileController::class, 'showPatientProfile'])->middleware('auth')->name('patient.home');
        //______________________________________Routes administratives__________________________________//
        Route::get('/Speciality', [ProfileController::class, 'manageSpeciality'])->name('Speciality');
        Route::get('/Medicament', [ProfileController::class, 'manageMedicament'])->name('Medicament');
        Route::get('/Profile/Edite', [ProfileController::class, 'manageProfile'])->name('Edite.profile');
        Route::get('/patient/Edite', [ProfileController::class, 'manageProfile'])->name('Edite.patient');
        //_________________________________________specialiter Crud_________________________________________//
        Route::get('/Speciality', [SpecialiteController::class, 'Show'])->name('Speciality');
        Route::post('/Speciality', [SpecialiteController::class, 'store'])->name('specialites.store');
        Route::put('/specialites/update/{id}', [SpecialiteController::class, 'update'])->name('specialites.update');
        Route::get('/detet-Spécialiter/{id}', [SpecialiteController::class, 'delete'])->name('delet.spesialiter');
        Route::get('/specialites/{id}/doctors', [SpecialiteController::class, 'showDoctors'])->name('specialites.doctors');

        //___________________________________________Médicament_____________________________________________//
        Route::get('/Medicament', [MedicamentController::class, 'index'])->name('Medicament');
        Route::get('/Appointment', [MedicamentController::class, 'show'])->name('Medicament.appointment');
        Route::post('/Medicament/Add', [MedicamentController::class, 'store'])->name('Medicament.Add');
        Route::put('/Medicament/Update/{id}', [MedicamentController::class, 'update'])->name('Medicament.Update');
        Route::get('/detet/Medicament/{id}', [MedicamentController::class, 'destroy'])->name('delet.Médicament');
        //____________________________________________Update reservation_____________________________________
        Route::get('/user', [ProfileController::class, 'showrecervation'])->name('user.reservation');
        //_______________________________________________Apointment Patient__________________________________
         Route::get('/patient/Appointment/{doctorID}', [ReservationsController::class, 'index'])->name('aptient.appointment');
        Route::post('/patient/Appointment', [ReservationsController::class, 'store'])->name('appointment.store');
        //________________________________________________Urgent____________________________________________
        Route::get('/patient/Urgent', [ReservationsController::class,'urgent'])->name('urgent');
        Route::post('/patient/Urgent', [ReservationsController::class,'reservationUrgent'])->name('urgent.store');
        //_________________________________________________Favorites___________________________________________
        Route::post('/favorites/add/{doctorId}', [FavorisController::class, 'add'])->name('favorites.add');
        Route::delete('/favorites/remove/{doctorId}', [FavorisController::class, 'remove'])->name('favorites.remove'); 
        Route::get('/favorites/list', [FavorisController::class, 'listFavorites'])->name('favorites.list');
        //____________________________________________________note___________________________________________
        Route::post('/Doctor/Note/store', [NoteControlle::class, 'store'])->name('note.store');
        //__________________________________________________Doctor Profile____________________________
        Route::get('/Doctor/Profile/{doctorID}',[ReservationsController::class,'doctorProfile'])->name('Doctor.profile');
        //___________________________________________________Consultation______________________________________
        // Web.php
        Route::post('/doctor/consultation/add', [ConsultationController::class, 'store'])->name('consultation.form');
        Route::put('doctor/consultation', [ConsultationController::class, 'add'])->name('consultation.add');
        // Route::get('/consultation/cart/{consultation}', [ConsultationController::class, 'show'])->name('consultation.cart');
        //_________________________________________________Consultation_________________________________________________________________
        //______________________________________________________logout__________________________________________________
        Route::get('/logout', function () {
            request()->session()->invalidate();
            \Illuminate\Support\Facades\Auth::logout();
            return redirect('/login');
        })->name('logout.perform');
    });


require __DIR__.'/auth.php';
