<?php

namespace App\Repositories;

use Bpjs\Bridging\Vclaim\BridgeVclaim;

class SepRepository
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeVclaim();
    }

    public function findByNomor($noSep)
    {
        $endpoint = 'SEP/' . $noSep;
        $data = $this->bridging->getRequest($endpoint);
        return json_decode($data, true);
    }

    public function history($noKartu, $startDate, $endDate)
    {
        $endpoint = 'monitoring/HistoriPelayanan/NoKartu/' . $noKartu . '/tglMulai/' . $startDate . '/tglAkhir/' . $endDate;
        $data = $this->bridging->getRequest($endpoint);
        return json_decode($data, true);
    }

    public function insert($data)
    {
        $endpoint = 'SEP/2.0/insert';
        $data = $this->bridging->postRequest($endpoint, $data);
        return json_decode($data, true);
    }
}
