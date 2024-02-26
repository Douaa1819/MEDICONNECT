<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\medicament;
use App\Models\Reservation;
use App\Models\Consultation;
use App\Models\ConsultationMedicament;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function store(Request $request)
    {
        $reservationID = $request->appointmentID;
        $patientID = $request->patientID;
        $medicaments = medicament::all();
        return view('doctor.consultation', compact('reservationID', 'patientID', 'medicaments'));
    }




    public function add(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'nbmrJour' => 'required|integer',
            'medicaments' => 'required|array',
            'medicaments.*' => 'exists:medicaments,id',
            'appointementID' => 'required|exists:reservations,id',
            'patientID' => 'required|integer',
            'doctorID' => 'required|integer',
        ]);


        $consultation = Consultation::create([
            'description' => $validated['description'],
            'nbmrJour' => $validated['nbmrJour'],
            'appointementID' => $validated['appointementID'],
            'patientID'=>$validated['patientID'],
            'doctorID'=>$validated['doctorID'],
        ]);

        foreach ($validated['medicaments'] as $medicamentId) {
            ConsultationMedicament::create([
                'consultationsID' => $consultation->id,
                'medicamentID' => $medicamentId,
            ]);
        }
        return redirect()->route('consultation.add');
}}