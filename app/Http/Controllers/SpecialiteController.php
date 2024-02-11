<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialite; 

class SpecialiteController extends Controller
{
    public function Show()
    {
        $specialites = Specialite::all();
        return view('admine.géreSpécialiter', compact('specialites')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Specialite::create([
            'nom' => $request->input('nom'),
        ]);

        return redirect()->back()->with('success', 'Spécialité ajoutée avec succès.');
    }


    public function update(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|string|max:255',
    ]);

    $specialite = Specialite::findOrFail($id);
    $specialite->update([
        'nom' => $request->nom,
    ]);

    return redirect()->back()->with('success', 'Spécialité modifiée avec succès.');
}




    public function delete($id)
    {
        $data = Specialite::find($id); 
        $data->delete();
        return redirect()->back(); 
    }

    public function manageSpeciality()
    {
       
        return view('admin.gereSpecialiter'); 
    }

    public function manageMedicament()
    {
       
        return view('admin.gereMedicament');
    }
}
