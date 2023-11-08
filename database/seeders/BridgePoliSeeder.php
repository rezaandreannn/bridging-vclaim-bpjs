<?php

namespace Database\Seeders;

use App\Models\BridgingDokter;
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
                'kode_dokter_rs' => '111', // dr. Agung Budi Prasetiyo
                'kode_poli' => 'INT',
                'kode_dokter_bpjs' => '18642'
            ],
            [
                'kode_dokter_rs' => '113', // dr. SLAMET WIDODO, Sp. PD 
                'kode_poli' => 'INT',
                'kode_dokter_bpjs' => '260234'
            ],
            [
                'kode_dokter_rs' => '140', // dr. Toumi Shiddiqi, Sp. P.D., M. Kes
                'kode_poli' => 'INT',
                'kode_dokter_bpjs' => '9971'
            ],
            [
                'kode_dokter_rs' => '148', // dr. ANDRIAN SUNER, Sp.M
                'kode_poli' => 'MAT',
                'kode_dokter_bpjs' => '219202'
            ],
            [
                'kode_dokter_rs' => '156', //dr. Muhammad Arfan, Sp.M
                'kode_poli' => 'MAT',
                'kode_dokter_bpjs' => '540568'
            ],
            [
                'kode_dokter_rs' => '125', //dr. Muhammad Arfan, Sp.M
                'kode_poli' => 'ORT',
                'kode_dokter_bpjs' => '18381'
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Loop melalui data dan masukkan ke dalam tabel
        foreach ($data as $item) {
            $existingKodeDokter = BridgingDokter::where('kode_dokter_rs', $item['kode_dokter_rs'])->first();

            if (!$existingKodeDokter) {
                BridgingDokter::create($item);
            }
        }
    }
}
