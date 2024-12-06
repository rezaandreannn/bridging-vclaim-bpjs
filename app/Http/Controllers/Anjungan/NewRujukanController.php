<?php

namespace App\Http\Controllers\Anjungan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RujukanRepository;

class NewRujukanController extends Controller
{
    protected $rujukanRepository;

    public function __construct(RujukanRepository $rujukanRepository)
    {
        $this->rujukanRepository = $rujukanRepository;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $noIdentitas)
    {
        // dd($noIdentitas);
        // CARI DATA PESERTA BERDASARKAN NO IDENTITAS
        // CARI RUJUKAN BERDASRKAN NO IDENTITAS
        $responseRujukan = $this->rujukanRepository->getByNomorKartu($noIdentitas);
        // CEK JIKA ADA RUJUKAN
        if ($responseRujukan['metaData']['code'] == 200) {
            dd($responseRujukan);
        } else {
            $message = 'Rujukan tidak ditemukan';
            return redirect()->back()->with('error', $message);
        }
        // CEK APAKAH RUJUKAN INI BISA UNTUK MENGGUNAKAN ANJUNGAN WHERE IN KODE POLI

    }
}
