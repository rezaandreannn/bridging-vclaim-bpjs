<?php

namespace App\Repositories;

use Bpjs\Bridging\Vclaim\BridgeVclaim;

class RujukanRepository
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeVclaim();
    }

    /**
     * Get Rujukan By Nomor Kartu.
     * @param string $nomorKartu
     * @return mixed The retrieved Rujukan data, or null if not found.
     */

    public function findByNoRujukan($noRujukan)
    {
        $endpoint = 'Rujukan/' . $noRujukan;
        $result = $this->bridging->getRequest($endpoint);
        return json_decode($result, true);
    }

    public function getByNomorKartu($nomorKartu)
    {
        $endpoint = 'Rujukan/List/Peserta/' . $nomorKartu;
        $result = $this->bridging->getRequest($endpoint);
        return json_decode($result, true);
    }

    public function findByNomorKartu($nomorKartu)
    {
        $endpoint = 'Rujukan/Peserta/' . $nomorKartu;
        $result = $this->bridging->getRequest($endpoint);
        return json_decode($result, true);
    }

    public function listRujukanKhusus($bulan, $tahun)
    {
        $endpoint = 'Rujukan/Khusus/List/Bulan/' . $bulan . '/Tahun/' . $tahun;
        $result = $this->bridging->getRequest($endpoint);
        return json_decode($result, true);
    }

    public function getListRsByNomorKartu($nomorKartu)
    {
        $endpoint = 'Rujukan/RS/List/Peserta/' . $nomorKartu;
        $result = $this->bridging->getRequest($endpoint);
        return json_decode($result, true);
    }
}
