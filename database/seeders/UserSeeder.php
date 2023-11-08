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
            'name' => 'admin rsumm',
            'email' => 'adminrsumm@gmail.com',
            'password' => bcrypt('rsumm2023')
        ]);

        $admin->assignRole('admin');



        
    }
}
