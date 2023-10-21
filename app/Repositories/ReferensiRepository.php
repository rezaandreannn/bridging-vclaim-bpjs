<?php

namespace App\Repositories;

use Bpjs\Bridging\Vclaim\BridgeVclaim;

class ReferensiRepository
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeVclaim();
    }

    public function getDpjp($kodeSpesialis)
    {
        $dateNow = date('Y-m-d');
        $endpoint = 'referensi/dokter/pelayanan/2/tglPelayanan/' . $dateNow . '/Spesialis/' . $kodeSpesialis;
        return $this->bridging->getRequest($endpoint);
    }
}
