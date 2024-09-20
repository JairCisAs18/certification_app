<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cert = array('Conoce', 'Realiza con supervisión', 'Realiza sin supervisión', 'Entrena a otros');
        foreach ($cert as $c){
            Certification::create(['NAME' => $c]);
        }
    }
}
