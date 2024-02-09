<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Specialite;

namespace App\Http\Controllers;

use App\Models\Specialite;

class SpecialiteController extends Controller
{
    public function index()
    {
        $specialites = Specialite::getAllSpecialites();
        return view('auth.register', compact('specialites'));
    }
    }



