<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends User
{
    protected $fillable = ['user_id'];
    public static function allPatients()
    {
        return self::where('role', 'patient')->get();
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appointement(){
        return $this->hasOne(Reservation::class, 'patient_id');
    }
    public function reservation(){
        return $this->hasOne(reservation::class,'patient_id');
    }
  
}
