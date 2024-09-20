<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = array('Operador A', 'Operador B', 'Operador C', 'Operador D', 'Operador E', 'Líder de línea JR', 'Líder de línea SR');
        foreach ($categories as $cat){
            Category::create(['CATEGORY'=>$cat]);
        }
    }
}
