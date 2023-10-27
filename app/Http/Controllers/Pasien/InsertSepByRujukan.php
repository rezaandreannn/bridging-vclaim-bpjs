<?php

namespace App\Http\Controllers\Pasien;

use Carbon\Carbon;
use App\Models\BridgePoli;
use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SEP\FingerPrintController;
use App\Repositories\FingerPrintRepository;
use App\Repositories\RujukanRepository;

class InsertSepByRujukan extends Controller
{
    protected $rujukanRepository;
    protected $sepRepository;
    protected $fingerPrintRepository;

    public function __construct(RujukanRepository $rujukanRepository, SepRepository $sepRepository, FingerPrintRepository $fingerPrintRepository)
    {
        $this->rujukanRepository = $rujukanRepository;
        $this->sepRepository = $sepRepository;
        $this->fingerPrintRepository = $fingerPrintRepository;
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
                // cek apakah pasien sudah finger 
                $findFinger = $this->cekFinger($nomorKartu);
                if ($poli != 'ANA' && $findFinger['kode'] != 1) {
                    dd($findFinger['status']);
                }
                // cek apakah poli rujukan sama dengan pendaftaran online rs
                if ($poli == $poliRs) {
                    $rujukans[] = $rujukan;
                }
                // get histori sep untuk
                $sepHistories = $this->getHistoriSep($nomorKartu);
                foreach ($sepHistories as $sepHistory) {
                    $noRujukan = $sepHistory['noRujukan'];
                    if ($noRujukan == $rujukans[0]['noKunjungan']) {
                        // data rujukan sudah tercetak sep, untuk buat sep harus buat surat kontrol
                        dd('data rujukan sudah tercetak sep, silahkan pilih surat kontrol untuk cetak sep');
                    }
                }
                // SEP belum tercetak
                return view('pasien.cetak-sep', compact('rujukans'));
            }
        } else {
            $message = 'rujukan tidak ditemukan';
            return redirect()->back()->with('message', $message);
        }
    }

    private function findPoli($kodeDokterRs)
    {
        return BridgePoli::where('kode_dokter_rs', $kodeDokterRs)->first();
    }

    public function getHistoriSep($noKartu)
    {
        // ambil data history SEP 
        $currentDate = Carbon::now();
        // ubah menjadi tanggal format (YYYY-mm-dd)
        $endDate = $currentDate->toDateString();
        // ambil tanggal 90 hari dari tanggal sekarang
        $startDate = $currentDate->copy()->subDays(90)->toDateString();

        $result =  $this->sepRepository->history($noKartu,  $startDate, $endDate);
        return $result['response']['histori'];
    }

    private function cekFinger($nomorKartu)
    {
        $dateNow = date('Y-m-d');

        $dataEncode =  $this->fingerPrintRepository->byNoKartuAndTanggal($nomorKartu, $dateNow);
        $data = json_decode($dataEncode, true);
        $result = $data['response'];
        return $result;
    }
}
