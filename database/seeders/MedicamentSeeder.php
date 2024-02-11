<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
        public function run()
    {
        $medicaments = [
            ['name' => 'Aspirine', 'specialite_id' => 1],
            ['name' => 'Paracétamol', 'specialite_id' => 1],
            ['name' => 'Adrénaline', 'specialite_id' => 2],
            ['name' => 'Noradrénaline', 'specialite_id' => 2],
            ['name' => 'Amoxicilline', 'specialite_id' => 3],
            ['name' => 'Ibuprofène', 'specialite_id' => 3],
            ['name' => 'Ciprofloxacine', 'specialite_id' => 4],
            ['name' => 'Azithromycine', 'specialite_id' => 4],
            ['name' => 'Tropicamide', 'specialite_id' => 5],
            ['name' => 'Timolol', 'specialite_id' => 5],
            ['name' => 'Levodopa', 'specialite_id' => 6],
            ['name' => 'Carbidopa', 'specialite_id' => 6],
            ['name' => 'Cortisone', 'specialite_id' => 7],
            ['name' => 'Hydrocortisone', 'specialite_id' => 7],
            ['name' => 'Atorvastatine', 'specialite_id' => 8],
            ['name' => 'Propranolol', 'specialite_id' => 8],
            ['name' => 'Metformine', 'specialite_id' => 10],
            ['name' => 'Simvastatine', 'specialite_id' => 10],
        ];

        DB::table('medicaments')->insert($medicaments);
    }
}
 