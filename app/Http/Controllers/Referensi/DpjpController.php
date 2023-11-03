<?php

namespace App\Http\Controllers\Referensi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bpjs\Bridging\Vclaim\BridgeVclaim;

class DpjpController extends Controller
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
    public function getDpjp()
    {

        // $endpoint = 'referensi/dokter/pelayanan/' . $namaKodePoli. '/tglPelayanan/'. $sdfsdf.  '/Spesialin/'. $dsf;
        $endpoint = 'referensi/dokter/pelayanan/2/tglPelayanan/2023-10-30/Spesialis/ORT';
        return $this->bridging->getRequest($endpoint);
    }
}
