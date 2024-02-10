<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Specialite; 
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        $user = Auth::user(); // Récupère l'utilisateur authentifié

        // Redirige vers une vue spécifique basée sur le rôle de l'utilisateur
        if ($user->role == 'doctor') {
            return view('doctor.doashbord', compact('user'));
        } elseif ($user->role == 'patient') {
            return view('patient.home', compact('user'));
        }

        // Redirection par défaut si le rôle n'est pas reconnu
        return redirect('/');
    }

    // Les méthodes update et destroy peuvent être ajustées de manière similaire si nécessaire


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
//aficher les specialisiter dans patient
public function showPatientProfile(): View
{
    $specialites = Specialite::all(); 
    return view('patient.home', compact('specialites')); 
}

public function showProfileBasedOnRole() {
    $role = auth()->user()->role; 

    if ($role === 'patient') {
        return view('patient.home');
    } elseif ($role === 'doctor') {
        return view('doctor.doashbord');
    }
    
    return redirect('/dashboard');
}


//admine
public function showAdminProfile()
{
    if (auth()->user()->role === 'admine') {
        return view('admine.profile');
    }
    return redirect('/');
}

public function manageSpeciality()
{
    if (auth()->user()->role === 'admine') {
        return view('admine\géreSpécialiter');
    }
    return redirect('/dashboard');
}

public function manageMedicament()
{
    if (auth()->user()->role === 'admine') {
        return view('admine\géreMédicament');
    }
    return redirect('/dashboard');
}
}

