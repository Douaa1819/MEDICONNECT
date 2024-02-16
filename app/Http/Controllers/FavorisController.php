<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Favoris;
use Illuminate\Http\Request;

class FavorisController extends Controller
{
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




   
   

