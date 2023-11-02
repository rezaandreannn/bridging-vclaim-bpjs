<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'mr',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'bpjs',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'pasien',
            'guard_name' => 'web'
        ]);
    }
}
