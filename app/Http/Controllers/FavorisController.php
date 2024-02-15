<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Favoris;
use Illuminate\Http\Request;

class FavorisController extends Controller
{
    public function toggle(request $request, $doctorId)
    {
        $validate = $request->validate([
            'patient_id' => 'required|exists:patients,id',
        ]);
        $patientId = $validate['patient_id'];
        $favori = Favoris::where('doctor_id', $doctorId)->where('patient_id', $patientId)->first();

        if ($favori) {
            $favori->delete();
        } else {
            Favoris::create([
                'doctor_id' => $doctorId,
                'patient_id' => $patientId,
            ]);
          }

        return back()->with('success', 'Favori mis à jour.');
    }

   
}
