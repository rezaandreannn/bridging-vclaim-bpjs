<?php

namespace App\Repositories;

use Bpjs\Bridging\Vclaim\BridgeVclaim;

class MonitoringRepository
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeVclaim();
    }

    public function klaim($tanggal, $jenisPelayanan, $status)
    {
        $endpoint = 'Monitoring/Klaim/tanggal/' . $tanggal . '/JnsPelayanan/' . $jenisPelayanan . '/status/' . $status;
        $data = $this->bridging->getRequest($endpoint);
        return json_decode($data, true);
    }

    public function kunjungan($tanggal, $jenisPelayanan)
    {
        $endpoint = 'Monitoring/Kunjungan/tanggal/' . $tanggal . '/JnsPelayanan/' . $jenisPelayanan;
        $data = $this->bridging->getRequest($endpoint);
        return json_decode($data, true);
    }
}
