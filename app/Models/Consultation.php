<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'patientID',
        'doctorID',
        'appointementID',
        'description',
        'nbmrJour',
    ];

    public function medicament()
    {
        return $this->hasMany(medicament::class,'medicamentID');
    }
}
