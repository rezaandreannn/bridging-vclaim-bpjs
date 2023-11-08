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

    public function getDpjpByKodePoli($jenisPelayanan, $tanggal, $kodePoli)
    {
        
        $endpoint = 'referensi/dokter/pelayanan/' . $jenisPelayanan .'/tglPelayanan/' . $tanggal . '/Spesialis/' . $kodePoli;
        $data = $this->bridging->getRequest($endpoint);
        return json_decode($data, true);
    }
}
