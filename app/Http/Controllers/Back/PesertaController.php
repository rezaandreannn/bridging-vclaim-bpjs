<?php

namespace App\Http\Controllers\Back;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\FingerPrintRepository;

class PesertaController extends Controller
{
    protected $fingerPrintRepository;
    public function __construct(FingerPrintRepository $fingerPrintRepository)
    {
        $this->fingerPrintRepository = $fingerPrintRepository;
    }

    public function index($param)
    {
        try {
            $client = new Client();
            $endpoint = 'https://daftar.rsumm.co.id/api.simrs/index.php/api/pasien/pendaftaran/status_pelayanan/' . $param;
            $response = $client->get($endpoint);
            $result = json_decode($response->getBody()->getContents(), true);

            // Ambil finger 
            $fingers = $this->fingerPrintRepository->byTanggal(date('Y-m-d'));

            if ($result['status'] == true) {
                $getPasiens = $result['data'];
                $pasiens = []; // Inisialisasi array pasien
                foreach ($getPasiens as $value) {
                    $fingerPrint = false; // Set mula-mula fingerPrint ke false
                    if ($value['KodeRekanan'] == '032') {
                        $rekanan = $value['KodeRekanan'];
                        foreach ($fingers['response']['list'] as $finger) {
                            if ($finger['noKartu'] == $value['No_Identitas']) {
                                $fingerPrint = true;
                                break; // Hentikan loop setelah menemukan finger
                            }
                        }
                        $dataPasien = [
                            'no_mr' => $value['No_MR'],
                            'no_kartu' => $value['No_Identitas'],
                            'nama_pasien' => $value['Nama_Pasien'],
                            'finger' => $fingerPrint,
                            'nama_dokter' => $value['Nama_Dokter'],
                            'no_telepon' => $value['HP1']
                        ];
                        $pasiens[] = $dataPasien; // Tambahkan dataPasien ke array pasien
                    }
                }
            } else {
                $pasiens = [];
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning', $th->getMessage());
        }

        // dd($pasiens);

        return view('peserta', compact('pasiens'));
    }
}
