<?php

namespace App\Http\Controllers\Referensi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bpjs\Bridging\Vclaim\BridgeVclaim;

class PoliController extends Controller
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeVclaim();
    }

    /**
     * Get Poli by Kode or Nama.
     *
     * This method retrieves a Poli by its Kode or Name.
     *
     * @param string|int $namaKodePoli The Kode or Name of the Poli to retrieve.
     * @return mixed The retrieved Poli data, or null if not found.
     */
    public function getPoli($namaKodePoli)
    {
        $endpoint = 'referensi/poli/' . $namaKodePoli;
        return $this->bridging->getRequest($endpoint);
    }
}
