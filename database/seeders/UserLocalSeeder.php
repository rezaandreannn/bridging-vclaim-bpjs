<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserLocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'email' => 'andreanreza042@gmail.com',
            'password' => Hash::make('rsumm2023'),
        ];

        $users = json_decode(File::get(storage_path('app/users.json')), true);

        // Tambahkan data pengguna baru ke dalam array users
        $users['users'][] = $data;

        // Simpan data ke dalam file JSON
        File::put(storage_path('app/users.json'), json_encode($users));


    }
}
