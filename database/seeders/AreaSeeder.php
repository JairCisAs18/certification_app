<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = array('SMT', 'FLUJO', 'ECU', 'USHIN', 'GNSS', 'TCU', 'XMA', 'ROD BASE', 'ANT TOP', 'CABLE', 'HARNESS', 'FEEDER');
        foreach ($areas as $area){
            Area::create(['NAME'=>$area]);
        }
        // Area::create(['NAME'=>'SMT']);
        // Area::create(['NAME'=>'FLUJO']);
        // Area::create(['NAME'=>'ECU']);
        // Area::create(['NAME'=>'USHIN']);
        // Area::create(['NAME'=>'GNSS']);
        // Area::create(['NAME'=>'TCU']);
        // Area::create(['NAME'=>'XMA']);
        // Area::create(['NAME'=>'BASE']);
        // Area::create([])
    }
}
