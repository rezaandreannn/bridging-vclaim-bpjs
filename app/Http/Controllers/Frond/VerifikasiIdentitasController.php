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
        $response = Http::get('https://daftar.rsumm.co.id/api.simrs/index.php/api/pasien/pendaftaran/' . $noMr);
        if ($response->status() == 200) {
            $dataLocal = json_decode($response->body(), true);
            // dd($dataLocal);
            // cek apakah pasien bpjs ?
            if ($dataLocal['data']['0']['KodeRekanan'] != '032') {
                dd('no mr tersebut bukan termasuk pasien antrean bpjs');
            } else {
                $noIdentitas = $dataLocal['data']['0']['No_Identitas'];

                // $rujukan = $this->rujukan->byNomorKartu($noIdentitas);
                // $dataRujukan = $rujukan['response']['rujukan'];
                // dd($dataRujukan);
                // return redirect()->route('rujukan.identitas', compact('dataRujukan'));
                return redirect()->route('rujukan.select', [
                    'nomorKartu' => $noIdentitas,
                ]);
            }
        } else {
            dd('nomor mr yang anda masukan tidak ada dalam antrean');
        }
    }

    public function selectRujukan($nomorKartu)
    {
        return view('frond.rujukan.select', compact('nomorKartu'));
    }

    // public function identitas($noIdentitas)
    // {
    //     $rujukan = $this->rujukan->byNomorKartu($noIdentitas);
    //     $data = $rujukan['response']['rujukan'][0]['peserta'];
    //     // dd($data);
    //     $biodata = [
    //         'noKartu' => $data['noKartu'],
    //         'nik' => $data['nik'],
    //         'nama' => $data['nama'],
    //         'noMR' => $data['mr']['noMR'],
    //         'sex' => $data['sex'],
    //         'kelas' => $data['hakKelas']['keterangan'],
    //         'tglLahir' => $data['tglLahir'],
    //         'tglTAT' => $data['tglTAT'],
    //         'tglTMT' => $data['tglTMT'],
    //         'tglCetakKartu' => $data['tglCetakKartu'],
    //         'peserta' => $data['jenisPeserta']['keterangan'],
    //         'status' => $data['statusPeserta']['keterangan'],
    //         'umurSekarang' => $data['umur']['umurSekarang'],
    //         'umurPelayanan' => $data['umur']['umurSaatPelayanan'],
    //     ];
    //     // dd($biodata);

    //     return view('frond.rujukan.index', compact('biodata'));
    // }

    // public function listRujukan($noIdentitas)
    // {
    //     $noKartu = $noIdentitas;
    //     $rujukan = $this->rujukan->byNomorKartu($noIdentitas);
    //     $listRujukan = $rujukan['response']['rujukan'];

    //     // dd($listRujukan);
    //     return view('frond.rujukan.list', compact('noKartu', 'listRujukan'));
    // }
}
