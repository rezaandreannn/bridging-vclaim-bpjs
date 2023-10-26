<?php

namespace Database\Seeders;

use App\Models\BridgePoli;
use Illuminate\Database\Seeder;

class BridgePoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // penyakit dalam(INT)
            [
                'kode_dokter_rs' => '111',
                'kode_poli' => 'INT',
                'kode_dokter_bpjs' => '18642'
            ],
            [
                'kode_dokter_rs' => '113',
                'kode_poli' => 'INT',
                'kode_dokter_bpjs' => '260234'
            ],
            [
                'kode_dokter_rs' => '140',
                'kode_poli' => 'INT',
                'kode_dokter_bpjs' => '9971'
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Loop melalui data dan masukkan ke dalam tabel
        foreach ($data as $item) {
            $existingKodeDokter = BridgePoli::where('kode_dokter_rs', $item['kode_dokter_rs'])->first();

            if (!$existingKodeDokter) {
                BridgePoli::create($item);
            }
        }
    }
}
