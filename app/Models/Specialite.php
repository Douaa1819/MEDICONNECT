<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialite extends Model

{
    use SoftDeletes;
    protected $table = 'specialites';
    protected $fillable = ['nom'];


    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'specialite_id');
    }
    public function medicaments()
    {
        return $this->hasMany(Medicament::class);
    }

}