<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jair Adalberto Cisneros Astello',
            'email' => 'j_cisneros@mitsumi.mx',
            'password' => bcrypt('Mits10umi23')
        ]);
        User::create([
            'name' => 'Diana Guevara',
            'email' => 'd_guevara@mitsumi.mx',
            'password' => bcrypt('holamundo')
        ]);
    }
}
