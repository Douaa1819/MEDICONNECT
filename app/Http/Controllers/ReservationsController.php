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

    public function update(Request $request, string $id)
    {
        //
    }

   
    public function destroy(string $id)
    {
        //
    }
}
