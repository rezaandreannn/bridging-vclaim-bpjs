<?php

namespace App\Http\Controllers\Referensi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bpjs\Bridging\Vclaim\BridgeVclaim;

class FaskesController extends Controller
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeVclaim();
    }

    /**
     * Get Faskes by Nama/Kode Faskes and Jenis Faskes.
     *
     * This method retrieves a Faskes by its Nama/Kode Faskes and Jenis Faskes.
     *
     * @param string|int $namaKodeFaskes The Nama or Kode Faskes to search for.
     * @param int $jenisFaskes The type of Faskes (1 for Faskes 1, 2 for Faskes 2/RS).
     * @return mixed The retrieved faskes data, or null if not found.
     */
    public function getFaskes($namaKodeFaskes, $jenisFaskes)
    {
        $endpoint = 'referensi/faskes/' . $namaKodeFaskes . $jenisFaskes;
        return $this->bridging->getRequest($endpoint);
    }
}
