<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Specialite;

namespace App\Http\Controllers;

use App\Models\Specialite;

class SpecialiteController extends Controller
{
    public function manageSpeciality()
    {
        // Ici, vous pourriez récupérer les spécialités de la base de données, par exemple :
        // $specialities = Speciality::all();
        
        // Retourne la vue de gestion des spécialités avec les données (si nécessaire)
        return view('admin.gereSpecialiter');
    }

    /**
     * Affiche la page de gestion des médicaments.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageMedicament()
    {
        // De même, pour les médicaments, vous pourriez faire :
        // $medicaments = Medicament::all();
        
        // Retourne la vue de gestion des médicaments avec les données (si nécessaire)
        return view('admin.gereMedicament');
    }
}

    



