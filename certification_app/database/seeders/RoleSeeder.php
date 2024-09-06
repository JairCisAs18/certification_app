<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'Administrator']);
        $hrRole = Role::create(['name' => 'Human Resources']);
        $adminUser = User::find(1);
        $hrUser = User::find(2);
        $adminUser->assignRole($adminRole);
        $hrUser->assignRole($hrRole);
        $adminUser->givePermissionTo(['add human resources', 'add operator', 'create exam']);
        $hrUser->givePermissionTo(['add operator', 'create exam']);
    }
}
