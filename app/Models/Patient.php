<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends User
{
    public static function allPatients()
    {
        return self::where('role', 'patient')->get();
    }
}
