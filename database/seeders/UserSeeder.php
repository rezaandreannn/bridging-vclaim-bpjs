<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'name' => 'Reza Andrean',
            'email' => 'andreanreza042@gmail.com',
            'password' => bcrypt('rsumm2023')
        ]);

        $admin->assignRole('admin');

        $mr = User::create([
            'name' => 'wiwin',
            'email' => 'wiwin@gmail.com',
            'password' => bcrypt('rsumm2023')
        ]);

        $mr->assignRole('mr');

        $pasien = User::create([
            'name' => 'pasien Tes',
            'email' => 'pasien@gmail.com',
            'password' => bcrypt('rsumm2023')
        ]);

        $pasien->assignRole('pasien');
    }
}
