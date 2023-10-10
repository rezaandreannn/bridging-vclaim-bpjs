<?php 

namespace App\Repositories;

use Bpjs\Bridging\Vclaim\BridgeVclaim;


class FingerPrintRepository 
{
  
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeVclaim();
    }

    /**
     * Get Finger Print by tanggal pelayanan.
     * @param string $tanggalPelayanan
     * @return mixed The retrieved Finger Print data, or null if not found.
     */
    public function byTanggal($tanggalPelayanan)
    {
        $endpoint = 'SEP/FingerPrint/List/Peserta/TglPelayanan/' . $tanggalPelayanan;
        $result = $this->bridging->getRequest($endpoint);
        $data = json_decode($result, true);

        if ($data['metaData']['code'] == 200) {
          return $data['response']['list'];
        }else{
           return $data;
        }

    }

      /**
     * Get Finger Print by no kartu and tanggal pelayanan.
     * @param int $noKartu
     * @param string $tanggalPelayanan
     * @return mixed The retrieved Finger Print data, or null if not found.
     */
    public function byNoKartuAndTanggal($noKartu, $tanggalPelayanan)
    {
        $endpoint = 'SEP/FingerPrint/Peserta/' . $noKartu . '/TglPelayanan/' . $tanggalPelayanan;
        return $this->bridging->getRequest($endpoint);
    }
}
