<?php

namespace App\Http\Controllers\SEP;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;
use Bpjs\Bridging\Vclaim\BridgeVclaim;

class HistoryPesertaController extends Controller
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
    public function __invoke(Request $request)
    {
        $currentDate = Carbon::now();
        // ubah menjadi tanggal format (YYYY-mm-dd)
        $endDate = $currentDate->toDateString();
        // ambil tanggal 90 hari dari tanggal sekarang
        $startDate = $currentDate->copy()->subDays(90)->toDateString();
        $noKartu = request()->session()->get('identitas');

        // cek apakah no kartu peserta ada
        if ($noKartu) {
            $result =  $this->sepRepository->history($noKartu,  $startDate, $endDate);
            $histories = $result['response']['histori'];
            // dd($histories);
            return view('sep.history', compact('histories', 'startDate', 'endDate'));
        } else {
            dd('no kartu peserta tidak sesuai');
        }
    }
}
