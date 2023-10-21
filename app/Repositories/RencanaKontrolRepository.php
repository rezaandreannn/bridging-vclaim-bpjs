<?php

namespace App\Repositories;

use Bpjs\Bridging\Vclaim\BridgeVclaim;

class RencanaKontrolRepository
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeVclaim();
    }

    /**
     * Get Surat Kontrol By Nomor Kartu.
     * @param string $nomorKartu
     * @return mixed The retrieved Surat Kontrol data, or null if not found.
     */

    public function findByNomorKartu($nomorKartu)
    {
        $bulan = date('m');
        $tahun = date('Y');
        $endpoint = 'RencanaKontrol/ListRencanaKontrol/Bulan/' . $bulan . '/Tahun/' . $tahun . '/NoKartu/' . $nomorKartu . '/filter/1';
        $result = $this->bridging->getRequest($endpoint);
        return json_decode($result, true);
    }
}
