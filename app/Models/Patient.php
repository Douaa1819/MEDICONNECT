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
   
  
}
