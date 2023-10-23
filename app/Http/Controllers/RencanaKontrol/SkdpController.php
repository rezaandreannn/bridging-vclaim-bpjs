<?php

namespace App\Http\Controllers\RencanaKontrol;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;

class SkdpController extends Controller
{
    protected $sepRepository;

    public function __construct(SepRepository $sepRepository)
    {
        $this->sepRepository = $sepRepository;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $currentDate = Carbon::now();
        // ubah menjadi tanggal format (YYYY-mm-dd)
        $endDate = $currentDate->toDateString();
        // ambil tanggal 90 hari dari tanggal sekarang
        $startDate = $currentDate->copy()->subDays(90)->toDateString();
        $noKartu = auth()->guard('peserta')->user()->no_kartu ?? '';


        // cek apakah no kartu peserta ada
        if ($noKartu) {
            $result =  $this->sepRepository->history($noKartu,  $startDate, $endDate);
            $histories = $result['response']['histori'];
            return view('rencana-kontrol.skdp.index');
        } else {
            dd('no kartu peserta tidak sesuai');
        }
    }
}
