<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'patient_id',
        'status',
    ];
   public function patient(){
    return $this->belongsTo(Patient::class ,'patient_id');

}

public function doctor(){
 return $this->belongsTo(Doctor::class ,'doctor_id');
 
}

}
