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

    public function byNomorKartu($nomorKartu)
    {
        $endpoint = 'Rujukan/' . $nomorKartu;
        $result = $this->bridging->getRequest($endpoint);
        return json_decode($result, true);
    }
}
