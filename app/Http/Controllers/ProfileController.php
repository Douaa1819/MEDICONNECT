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
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        $user = Auth::user(); 
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



    public function showPatientProfile(): View
    {
        $specialites = Specialite::all(); 
        return view('patient.home', compact('specialites')); 
    }



    public function showProfileBasedOnRole() {
    $role = auth()->user()->role; 

    if ($role === 'patient') {
        $specialites = Specialite::all(); 
        return view('patient.home', compact('specialites')); 
    } elseif ($role === 'doctor') {
        $result = DB::select("SHOW COLUMNS FROM reservations WHERE Field = 'booking_time'");
        preg_match("/^enum((.*))$/", $result[0]->Type, $matches);
        
        $appointments = array();
        foreach (explode(',', $matches[1]) as $value) {
            $appointments[] = trim($value, "('')");
           
        }
        $appointments_reserved = Reservation::where('doctor_id', Auth::user()->doctor->id)->pluck('booking_time');
        return view('doctor.doashbord', compact('appointments','appointments_reserved'));
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
    if (auth()->user()->role === 'admine') { 
        return view('admine\Editeprofile', [ 
            'user' => auth()->user(),
        ]);
    } elseif (auth()->user()->role === 'doctor') {
        return view('doctor\Editeprofile', [ 
            'user' => auth()->user(),
        ]);
    } elseif (auth()->user()->role === 'patient') {
        return view('patient\Edite', [ 
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







}

