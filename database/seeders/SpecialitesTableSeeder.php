<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialitesTableSeeder extends Seeder
{
    public function run()
    {
        $specialites = [
            'Médecine interne',
            'Médecine d\'urgence',
            'Pédiatrie',
            'Otorhinolaryngologie (ORL)',
            'Ophtalmologie',
            'Neurologie',
            'Dermatologie',
            'Cardiologie',
            'Médecine générale ',
        ];

        foreach ($specialites as $specialite) {
            DB::table('specialites')->insert([
                'nom' => $specialite,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
