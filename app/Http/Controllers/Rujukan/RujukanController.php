<?php

namespace App\Http\Controllers\Rujukan;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RujukanRepository;


class RujukanController extends Controller
{
    /**
     * The user repository implementation.
     *
     * @var RujukanRepository
     */
    protected $rujukan;

    /**
     * Create a new controller instance.
     *
     * @param  RujukanRepository  $rujukan
     * @return void
     */
    public function __construct(RujukanRepository $rujukan)
    {
        $this->rujukan = $rujukan;
    }
    /**
     * Get Nomor Rujukan.
     * @return mixed The retrieved Rujukan data, or null if not found.
     */

    public function list(Request $request)
    {
        $noKartu = $request->session()->get('identitas');
        $response = $this->rujukan->getByNomorKartu($noKartu);
        $dataRujukan = $response['response']['rujukan'];

        $rujukans = [];
        foreach ($dataRujukan as $rujukan) {
            $tglKunjungan = Carbon::parse($rujukan['tglKunjungan']);
            $currentDate = Carbon::now();
            $threeMonthsAgo = $currentDate->subMonths(3);

            if ($tglKunjungan->gt($threeMonthsAgo)) {
                $rujukans[] = $rujukan;
            }
        }
        // dd($rujukans);
        return view('rujukan.list', compact('rujukans'));
    }

    public function listRs(Request $request)
    {
        $noKartu = $request->session()->get('identitas');
        $response = $this->rujukan->getListRsByNomorKartu($noKartu);
        $dataRujukan = $response['response'];
        dd($dataRujukan);
    }
}
