<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicament extends Model
{
    protected $table = 'medicaments';
    protected $fillable = ['name'];

    
    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'specialite_id');
    }
}
