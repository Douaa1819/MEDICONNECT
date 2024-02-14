<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medicament;
use App\Models\Specialite; 


class MedicamentController extends Controller
{
  
    public function index()
    {
        $specialites = Specialite::with('medicaments')->get();
        $medicaments = Medicament::with('specialite')->get();
        return view('doctor.Médicament', compact('specialites', 'medicaments'));
    }


  
    public function create()
    {
        
    }

   
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'specialite_id' => 'required|integer',
    ]);

    Medicament::create([
        'name' => $request->input('name'),
        'specialite_id' => $request->input('specialite_id'),
    ]);

    return redirect()->back()->with('success', 'Medicament ajoutée avec succès.');
}
   
    public function show(string $id)
    {
        
    }

   
    public function edit(string $id)
    {
        
    }

   
    public function update(Request $request, string $id)
    {
       
    }

   
    public function destroy( $id)
    {
        $data=medicament::find($id);
        $data->delete();
        return redirect()->back();
    }
}
