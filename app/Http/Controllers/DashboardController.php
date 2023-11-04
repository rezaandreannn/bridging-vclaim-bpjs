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
        $Proses =  $this->monitoringRepository->klaim($tanggal, 2, 1);
        $Pending =  $this->monitoringRepository->klaim($tanggal, 2, 2);
        $Klaim =  $this->monitoringRepository->klaim($tanggal, 2, 3);

        if ($Proses['metaData']['code'] == 200) {
            $totalProses = count($Proses['response']['klaim']);
        }else{
            $totalProses = 0;
        } 

        if ($Pending['metaData']['code'] == 200) {
            $totalPending = count($Pending['response']['klaim']);
        }else{
            $totalPending = 0;
        }

        if ($Klaim['metaData']['code'] == 200) {
            $totalKlaim = count($Klaim['response']['klaim']);
        }else{
            $totalKlaim = 0;
        }

        $result = [
            'totalProses' => $totalProses,
            'totalPending' => $totalPending,
            'totalKlaim' => $totalKlaim,
            'totalRajal' => $totalKlaim + $totalPending + $totalProses
        ];  
        // dd($result);
        return view('dashboard', compact('result'));
    }

    public function countKlaimRajal(Request $request)
    {
        $tanggal = $request->tanggal_klaim;
        $Proses =  $this->monitoringRepository->klaim($tanggal, 2, 1);
        $Pending =  $this->monitoringRepository->klaim($tanggal, 2, 2);
        $Klaim =  $this->monitoringRepository->klaim($tanggal, 2, 3);

        if ($Proses['metaData']['code'] == 200) {
            $totalProses = count($Proses['response']['klaim']);
        }else{
            $totalProses = 0;
        } 

        if ($Pending['metaData']['code'] == 200) {
            $totalPending = count($Pending['response']['klaim']);
        }else{
            $totalPending = 0;
        }

        if ($Klaim['metaData']['code'] == 200) {
            $totalKlaim = count($Klaim['response']['klaim']);
        }else{
            $totalKlaim = 0;
        }

        $result = [
            'totalProses' => $totalProses,
            'totalPending' => $totalPending,
            'totalKlaim' => $totalKlaim,
            'totalRajal' => $totalKlaim + $totalPending + $totalProses
        ];

        return response()->json($result);
       
    }

}
