<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\RencanaKontrolKronis;
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
        $duaBulanYangLalu = date('Y-m-d', strtotime('-2 month', strtotime($tanggal)));
        try {
            $rajal = $this->calculateKlaim($duaBulanYangLalu, 2);
            $ranap = $this->calculateKlaim($duaBulanYangLalu, 1);
            $chart_data = $this->countPesertaKronis();
            $totalPeserta = $this->countPeserta();
        } catch (\Throwable $th) {
            dd($th);
        }
        return view('dashboard', compact('rajal', 'ranap', 'chart_data', 'duaBulanYangLalu', 'totalPeserta'));
    }

    public function countKlaimRajal(Request $request)
    {
        $tanggal = $request->tanggal_klaim;
        $result = $this->calculateKlaim($tanggal, 2);
        return response()->json($result);
    }

    public function countKlaimRanap(Request $request)
    {
        $tanggal = $request->tanggal_klaim;
        $result = $this->calculateKlaim($tanggal, 1);
        return response()->json($result);
    }

    private function calculateKlaim($tanggal, $pelayanan)
    {
        $Proses =  $this->monitoringRepository->klaim($tanggal, $pelayanan, 1);
        $Pending =  $this->monitoringRepository->klaim($tanggal, $pelayanan, 2);
        $Klaim =  $this->monitoringRepository->klaim($tanggal, $pelayanan, 3);

        $totalProses = ($Proses['metaData']['code'] == 200) ? count($Proses['response']['klaim']) : 0;
        $totalPending = ($Pending['metaData']['code'] == 200) ? count($Pending['response']['klaim']) : 0;
        $totalKlaim = ($Klaim['metaData']['code'] == 200) ? count($Klaim['response']['klaim']) : 0;

        return [
            'totalProses' => $totalProses,
            'totalPending' => $totalPending,
            'totalKlaim' => $totalKlaim,
            'total' => $totalKlaim + $totalPending + $totalProses
        ];
    }

    public function countPesertaKronis()
    {
        $record = RencanaKontrolKronis::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();

        $data = [];

        foreach ($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        $chart_data = json_encode($data);

        return $chart_data;
    }

    private function countPeserta()
    {
        $client = new Client();
        $endpoint = 'https://daftar.rsumm.co.id/api.simrs/index.php/api/pasien/pendaftaran';
        $response = $client->get($endpoint);
        $result = json_decode($response->getBody()->getContents(), true);

        if ($result['status'] == true) {
            $pasiens = [];
            $getPasiens = $result['data'];
            foreach ($getPasiens as  $value) {
                $rekanan = $value['KodeRekanan'];
                if ($rekanan == '032') {
                    $pasiens[] = $value;
                }
            }
        } else {
            $pasiens = [];
        }
        $total = count($pasiens);
        return $total;
    }
}
