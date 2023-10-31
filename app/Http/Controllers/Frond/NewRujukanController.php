<?php

namespace App\Http\Controllers\Frond;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RujukanRepository;
use App\Repositories\ReferensiRepository;
use App\Repositories\FingerPrintRepository;
use Laravel\Sail\Console\PublishCommand;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

class NewRujukanController extends Controller
{
    protected $rujukan;
    protected $finger;
    protected $referensi;

    public function __construct(RujukanRepository $rujukan, FingerPrintRepository $finger, ReferensiRepository $referensi)
    {
        $this->rujukan = $rujukan;
        $this->finger = $finger;
        $this->referensi = $referensi;
    }

    public function index($nomorKartu)
    {
        $rujukan = $this->rujukan->findByNomorKartu($nomorKartu);
        $dataRujukan = $rujukan['response']['rujukan'];
        $kodePoli = $dataRujukan['poliRujukan']['kode'];
        dd($dataRujukan);

        $getDpjp = $this->referensi->getDpjp($kodePoli);
        $dpjp = json_decode($getDpjp, true);
        // cek finger 
        $findFinger = $this->cekFinger($nomorKartu);
        if ($kodePoli != 'ANA' && $findFinger['kode'] != 1) {
            dd($findFinger['status']);
        }
        // dd($dpjp['response']['list']);

        return view('frond.rujukan.list-dokter', compact('dpjp'));
    }

    private function cekFinger($nomorKartu)
    {
        $dateNow = date('Y-m-d');

        $dataEncode =  $this->finger->byNoKartuAndTanggal($nomorKartu, $dateNow);
        $data = json_decode($dataEncode, true);
        $result = $data['response'];
        return $result;
    }

    public function cetak(){

        $connector = new FilePrintConnector(config('app.printer_url'));
        $printer = new Printer($connector);

        $printer->setJustification(Printer::JUSTIFY_CENTER);

        $printer->setEmphasis();
        $printer->text("RSU MUHAMMADIYAH METRO\n");
        $printer->setEmphasis(false);

        $printer->setTextSize(1, 1);
        $printer->text("Jl. Soekarno Hatta No.42 Mulyojati 16B \n Metro Barat Kota Metro\n\n");



        $printer->setTextSize(1, 1);
        $printer->text("Nama Pasien : parjo \n\n");

        $printer->setTextSize(1, 1);
        $printer->text("No MR : tes \n\n");


        $printer->setTextSize(1, 1);
        $printer->setEmphasis();
        $printer->text("Telah Melakukan Finger dan Cetak SEP \n");
        $printer->setEmphasis(false);

        $printer->setTextSize(1, 1);
        $printer->text("Pada " . date('d-m-Y h:i:s'));
        $printer->feed(3);

        $printer->cut();
        $printer->close();
        return redirect()->back();
    }
}
