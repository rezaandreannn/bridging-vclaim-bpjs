<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            // penyakit dalam(INT)
            [
                'name' => 'peserta',
                'guard_name' => 'web'
            ],
            [
                'name' => 'rencana kontrol',
                'guard_name' => 'web'
            ],
            [
                'name' => 'referensi',
                'guard_name' => 'web'
            ],
            [
                'name' => 'monitoring',
                'guard_name' => 'web'
            ],
            [
                'name' => 'lembar pengajuan klaim',
                'guard_name' => 'web'
            ],
            [
                'name' => 'manage user',
                'guard_name' => 'web'
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        foreach ($data as $item) {
            # code...
            Permission::create($item);
        }

        
    }
}
