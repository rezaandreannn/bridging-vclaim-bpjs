<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BridgePoli;
use App\Repositories\RujukanRepository;

class InsertSepByRujukan extends Controller
{
    protected $rujukanRepository;

    public function __construct(RujukanRepository $rujukanRepository)
    {
        $this->rujukanRepository = $rujukanRepository;
    }

    public function insertSep()
    {
        // ambil session pasien
        $nomorKartu = session()->get('pasien')['no_identitas'];
        $kodeDokterRs = session()->get('pasien')['kode_dokter_rs'];

        // get rujukan by nomor kartu
        $response = $this->rujukanRepository->getByNomorKartu($nomorKartu);
        if ($response['metaData']['code'] == 200) {
            $dataRujukan = $response['response']['rujukan'];
            $rujukans = [];
            foreach ($dataRujukan as $rujukan) {
                // ambil poli berdasarkan pendaftaran online
                $bridge = $this->findPoli($kodeDokterRs);
                $poliRs = $bridge['kode_poli'];
                $poli = $rujukan['poliRujukan']['kode'];
                // cek apakah poli rujukan sama dengan pendaftaran online rs
                if ($poli == $poliRs) {
                    $rujukans[] = $rujukan;
                }
                dd($rujukans[0]);
            }
        } else {
            return redirect()->back();
        }
        // find bridge rs dan bpjs sesuai kode dokter
        // find rujukan berdasarkan kode poli dan dokter
        // cek finger selain poli anak
        // mapping dataa insert sep
        // jika surat kontrol diagnosa z
        // send SEP
    }

    private function findPoli($kodeDokterRs)
    {
        return BridgePoli::where('kode_dokter_rs', $kodeDokterRs)->first();
    }
}
