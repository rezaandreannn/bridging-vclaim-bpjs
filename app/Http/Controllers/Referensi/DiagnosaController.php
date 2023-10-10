<?php

namespace App\Http\Controllers\Referensi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bpjs\Bridging\Vclaim\BridgeVclaim;

class DiagnosaController extends Controller
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeVclaim();
    }

    /**
     * Get Diagnosa By Kode or nama.
     * @param string $namaKodeDiagnosa
     * @return mixed The retrieved diagnosa data, or null if not found.
     */
    public function getDiagnosa($namaKodeDiagnosa)
    {
        $endpoint = 'referensi/diagnosa/' . $namaKodeDiagnosa;
        return $this->bridging->getRequest($endpoint);
    }
}
