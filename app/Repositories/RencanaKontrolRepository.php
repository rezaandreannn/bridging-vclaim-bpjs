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
     * Get Surat Kontrol.
     * @param string|int $bulan
     * @param string|int $tahun
     * @param string|int $nomorKartu
     * @return mixed The retrieved Surat Kontrol data, or null if not found.
     */

    public function getByNomorKartu($bulan, $tahun, $nomorKartu)
    {
        $endpoint = 'RencanaKontrol/ListRencanaKontrol/Bulan/' . $bulan . '/Tahun/' . $tahun . '/NoKartu/' . $nomorKartu . '/filter/1';
        $result = $this->bridging->getRequest($endpoint);
        return json_decode($result, true);
    }
}
