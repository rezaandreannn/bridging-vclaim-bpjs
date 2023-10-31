<?php

namespace App\Http\Controllers\Back\Monitoring;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MonitoringRepository;

class KunjunganController extends Controller
{
    protected $monitoringRepository;

    public function __construct(MonitoringRepository $monitoringRepository)
    {
        $this->monitoringRepository = $monitoringRepository;
    }

    public function index(Request $request)
    {
        $kunjungans = [];
        if ($request->jenis_pelayanan) {
            $tanggal = $request->tanggal ?? date('Y-m-d');
            $pelayanan = $request->jenis_pelayanan;


            $data =  $this->monitoringRepository->kunjungan($tanggal, $pelayanan);
            if ($data['metaData']['code'] == 200) {
                $kunjungans = $data['response']['sep'];
                // dd($kunjungans);
            } else {
                $kunjungans = [];
                // dd($kunjungans);
            }
        }


        return view('monitoring.kunjungan', compact('kunjungans'));
    }
}
