<?php

namespace App\Http\Controllers\Peserta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bpjs\Bridging\Vclaim\BridgeVclaim;

class FindByNomorKartuController extends Controller
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
    public function index()
    {

        // $endpoint = 'referensi/dokter/pelayanan/' . $namaKodePoli. '/tglPelayanan/'. $sdfsdf.  '/Spesialin/'. $dsf;
        $endpoint = 'Peserta/NoKartu/0002498554315/tglSEP/2023-10-28';
        return $this->bridging->getRequest($endpoint);
    }
}
