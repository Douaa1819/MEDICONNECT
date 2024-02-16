<?php

namespace App\Http\Controllers;

use App\Models\commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
            'patientID' => 'required|int',
            'doctorID' => 'required|int',
           
        ]);
        $comment = new commentaire();
        $comment->comment = $validatedData['comment'];
        $comment->doctor_id = $validatedData['doctorID']; 
        $comment->patient_id = $validatedData['patientID']; 
        $comment->save();
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

}
