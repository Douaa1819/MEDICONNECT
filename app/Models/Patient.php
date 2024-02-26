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
        return $this->belongsTo(User::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class ,'patient_id');
    }

    public function review(){
        return $this->hasOne(note::class);
    }
  
}
