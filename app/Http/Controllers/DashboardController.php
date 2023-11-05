<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MonitoringRepository;

class DashboardController extends Controller
{
    protected $monitoringRepository;

    public function __construct(MonitoringRepository $monitoringRepository)
    {
        $this->monitoringRepository = $monitoringRepository;
    }
    
    public function index()
    {
        $tanggal = date('Y-m-d');
        $result = $this->calculateKlaim($tanggal);
        return view('dashboard', compact('result'));
    }
    
    public function countKlaimRajal(Request $request)
    {
        $tanggal = $request->tanggal_klaim;
        $result = $this->calculateKlaim($tanggal);
        return response()->json($result);
    }
    
    private function calculateKlaim($tanggal)
    {
        $Proses =  $this->monitoringRepository->klaim($tanggal, 2, 1);
        $Pending =  $this->monitoringRepository->klaim($tanggal, 2, 2);
        $Klaim =  $this->monitoringRepository->klaim($tanggal, 2, 3);
    
        $totalProses = ($Proses['metaData']['code'] == 200) ? count($Proses['response']['klaim']) : 0;
        $totalPending = ($Pending['metaData']['code'] == 200) ? count($Pending['response']['klaim']) : 0;
        $totalKlaim = ($Klaim['metaData']['code'] == 200) ? count($Klaim['response']['klaim']) : 0;
    
        return [
            'totalProses' => $totalProses,
            'totalPending' => $totalPending,
            'totalKlaim' => $totalKlaim,
            'totalRajal' => $totalKlaim + $totalPending + $totalProses
        ];
    }

}
