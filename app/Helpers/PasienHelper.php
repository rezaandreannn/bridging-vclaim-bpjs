<?php

namespace App\Helpers;

use App\Models\Pasien;

class PasienHelper
{
    public static function generateNoMR($noBpjs)
    {
        // Validasi No BPJS
        if (strlen($noBpjs) !== 13) {
            return null; // No BPJS tidak valid
        }

        // Ambil data pasien terakhir dengan No BPJS serupa
        $lastPasien = Pasien::where('No_Identitas', $noBpjs)
            ->first();


        if ($lastPasien) {
            // Pasien sudah ada, gunakan No MR yang sama
            return $lastPasien->No_MR;
        }
    }
}
