<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    
    public function index()
    {
        $appointements= Reservation::with('patient')->get();
        return view('patient\reservation', compact('appointements'));   
    }

    public function create()
    {

    }


    public function store(Request $request)
    {
        //
    }

   
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request)
    {
        $validate=$request->validate([
            'appointement' => 'required|integer',
            'patient_id' => 'required|integer',
        ]);
    
        $appointements = Reservation::findOrFail($validate['appointement']);
        $appointements->update([
            'patient_id' => $request->patient_id,
            'status' => 1,
            
        ]);
    
        return redirect()->back()->with('success', 'Spécialité modifiée avec succès.');
    
    }

   
    public function destroy(string $id)
    {
        //
    }
}
