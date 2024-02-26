<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Favoris;
use App\Models\Doctor;
use Illuminate\Http\Request;

class FavorisController extends Controller
{
    public function listFavorites()
    {
        if (Auth::check()) {
            $patientId = Auth::user()->patient->id;
            // Récupérer les docteurs favoris
            $favorites = Favoris::where('patient_id', $patientId)->get();
            $countFavorites = $favorites->count();
    
            // Récupérer les informations des docteurs à partir des favoris
            $doctorIds = $favorites->pluck('doctor_id');
            $doctors = Doctor::whereIn('id', $doctorIds)->get();
    
            return view('patient.listeFavoris', compact('doctors', 'countFavorites'));
        } else {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à vos favoris.');
        }
    }


    public function add($doctorId)
    {
        $patientId = Auth::user()->patient->id;
        $exists = Favoris::where('doctor_id', $doctorId)->where('patient_id', $patientId)->exists();

        if (!$exists) {
            Favoris::create([
                'doctor_id' => $doctorId,
                'patient_id' => $patientId,
            ]);
        }

        return back()->with('success', 'Docteur ajouté aux favoris');
    }

    public function remove($doctorId)
    {
        $patientId = Auth::user()->patient->id;
        Favoris::where('doctor_id', $doctorId)->where('patient_id', $patientId)->delete();
        return back()->with('success', 'Docteur retiré des favoris');
    }
}







   
   

