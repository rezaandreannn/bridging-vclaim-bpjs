<?php

namespace App\Http\Controllers\Frond;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\FingerPrintRepository;
use Illuminate\Support\Facades\Http;
use App\Repositories\RujukanRepository;

class VerifikasiIdentitasController extends Controller
{
    protected $rujukan;
    protected $finger;

    public function __construct(RujukanRepository $rujukan, FingerPrintRepository $finger)
    {
        $this->rujukan = $rujukan;
        $this->finger = $finger;
    }

    public function index()
    {
        $title = 'Verifikasi Identitas';
        return view('frond.verifikasi-identitas');
    }

    public function proses(Request $request)
    {
        $noMr = $request->no_mr;
        $response = Http::get('http://192.168.2.120/api.simrs/index.php/api/pasien/pendaftaran/' . $noMr);
        if ($response->status() == 200) {
            $dataLocal = json_decode($response->body(), true);
            // cek apakah pasien bpjs ?
            if ($dataLocal['data']['0']['KodeRekanan'] != '032') {
                dd('no mr tersebut bukan termasuk pasien antrean bpjs');
            } else {
                $noIdentitas = $dataLocal['data']['0']['No_Identitas'];
                $rujukan = $this->rujukan->byNomorKartu($noIdentitas);
                $dataRujukan = $rujukan['response'];
                dd($dataRujukan);
                return view('frond.rujukan.index', compact('dataRujukan'));
            }
        } else {
            dd('nomor mr yang anda masukan tidak ada dalam antrean');
        }
    }
}
