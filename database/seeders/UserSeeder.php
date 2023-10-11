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
        User::create([
            'name' => 'Reza Andrean',
            'email' => 'andreanreza042@gmail.com',
            'password' => bcrypt('rsumm2023')
        ]);
    }
}
