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

    public function findByNomor($nomorSep)
    {
        $endpoint = 'SEP/' . $nomorSep;
        $data = $this->bridging->getRequest($endpoint);
        $result = json_decode($data, true);
    }
}
