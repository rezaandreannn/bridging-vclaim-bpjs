<?php

namespace App\Http\Controllers\Back\Monitoring;

use App\Http\Controllers\Controller;
use App\Repositories\MonitoringRepository;
use Illuminate\Http\Request;

class KlaimController extends Controller
{
    protected $monitoringRepository;

    public function __construct(MonitoringRepository $monitoringRepository)
    {
        $this->monitoringRepository = $monitoringRepository;
    }

    public function index(Request $request)
    {
        $klaims = [];
        if ($request->jenis_pelayanan) {
            $tanggal = $request->tanggal ?? date('Y-m-d');
            $pelayanan = $request->jenis_pelayanan;

            $statusKlaim = $request->status_klaim;

            $data =  $this->monitoringRepository->klaim($tanggal, $pelayanan, $statusKlaim);
            // dd($data['metaData']['code'] == 200);
            if ($data['metaData']['code'] == 200) {
                $klaims = $data['response']['klaim'];
                dd($klaims);
            } else {
                $klaims = [];
                dd($klaims);
            }
        }


        return view('monitoring.klaim', compact('klaims'));
    }
}
