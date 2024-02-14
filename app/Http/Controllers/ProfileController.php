<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Specialite; 
use App\Models\Reservation; 
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        $user = Auth::user(); // Récupère l'utilisateur authentifié

        if ($user->role == 'doctor') {
            return view('doctor.doashbord', compact('user'));
        } elseif ($user->role == 'patient') {
            return view('patient.home', compact('user'));
        } elseif ($user->role == 'admine') {
            return view('admine.profile', compact('user'));
        }

        return redirect('/');
    }
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
        $appointements= Reservation::with('patient')->get();
        return view('doctor.doashbord', compact('appointements'));
    }elseif( $role === 'admine') {
        return view('/admine/profile');
    
    return redirect('/register');
}
}

//admine
public function manageSpeciality()
{
    if (auth()->user()->role === 'admine') {
        return view('admine\géreSpécialiter');
    }
    return view('admine.profile');
}

public function manageMedicament()
{
    if (auth()->user()->role === 'admine') {
        return view('admine\géreMédicament');}
        elseif(auth()->user()->role === 'doctor'){
            return view('doctor\Médicament');
    }
    return view('admine.profile');
}

public function manageProfile()
{
    if (auth()->user()->role === 'admine') { // Assurez-vous que la valeur 'admine' est correcte selon votre base de données. Généralement, c'est 'admin'.
        return view('admine\Editeprofile', [ // Utilisez un point pour séparer les dossiers au lieu de l'antislash. Aussi, corrigez le chemin si nécessaire.
            'user' => auth()->user(),
        ]);
    } elseif (auth()->user()->role === 'doctor') {
        return view('doctor\Editeprofile', [ // Corrigez le chemin avec des points.
            'user' => auth()->user(),
        ]);
    } elseif (auth()->user()->role === 'patient') {
        return view('patient\Edite', [ // Corrigez le chemin avec des points.
            'user' => auth()->user(),
        ]);
    return view('', [
        'user' => auth()->user(),
    ]);
}
//reservatiion
}
 public function showrecervation(){

    return view('doctor\doashbord');


 }

//Update   


public function updateProfilePicture(Request $request)
{
    $request->validate([
        'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user = Auth::user();
    $imageName = time().'.'.$request->picture->getClientOriginalExtension();  
    $request->picture->move(public_path('images/profiles'), $imageName);

    // Mettre à jour l'URL de l'image de profil dans la base de données
    $user->profile_picture_url = 'images/profiles/'.$imageName;
    // $user->save();
    return back()->with('success', 'Image de profil mise à jour avec succès.');
}


}