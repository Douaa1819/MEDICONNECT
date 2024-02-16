<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\note; 

class NoteControlle extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'doctorID' => 'required|integer',
            'patientID' => 'required|integer',
            'comment' => 'required|string',
            'starCount' => 'required|integer',
        ]);

        $newReview = note::create([
            'doctor_id' => $validatedData['doctorID'],
            'patient_id' => $validatedData['patientID'],
            'Comment' => $validatedData['comment'],
            'Countnote' => $validatedData['starCount'],
        ]);

        return redirect()->back()->with('success', 'Spécialité ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
