<?php

namespace App\Repositories;

use Bpjs\Bridging\Vclaim\BridgeVclaim;

class PesertaRepository
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeVclaim();
    }

    public function byNomor($noKartu)
    {
  
        $date = date('Y-m-d');
        $endpoint = 'Peserta/nokartu/'.$noKartu.'/tglSEP/' . $date ;
        $data = $this->bridging->getRequest($endpoint);
        return json_decode($data, true);
    }
}
