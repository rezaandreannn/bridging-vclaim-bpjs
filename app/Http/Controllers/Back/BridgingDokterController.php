<?php

namespace App\Http\Controllers\Back;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\BridgingDokter;
use App\Http\Controllers\Controller;
use App\Repositories\ReferensiRepository;

class BridgingDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReferensiRepository $referensiRepository)
    {
        $resultData = [];
        try {
            $bridgingDokters = BridgingDokter::all();
            $client = new Client();
            // $endpoint = 'https://192.168.2.131/api.simrs/index.php/api/dokter';
            $endpoint = 'https://daftar.rsumm.co.id/api.simrs/index.php/api/dokter';
            $response = $client->get($endpoint, ['verify' => false]);
            $result = json_decode($response->getBody()->getContents(), true);
            foreach ($bridgingDokters as $bridgingDokter) {
                foreach ($result['data'] as $dokter) {
                    if ($bridgingDokter['kode_dokter_rs'] == $dokter['Kode_Dokter']) {
                        $data = [
                            'kode_dokter_rs' => $dokter['Kode_Dokter'],
                            'nama_dokter_rs' => $dokter['Nama_Dokter'],
                            'kode_poli' => $bridgingDokter['kode_poli'],
                            'kode_dokter_bpjs' => $bridgingDokter['kode_dokter_bpjs']
                        ];
                        $resultData[] = $data;
                    }
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning', $th->getMessage());
        }

        return view('bridging.dokter.index', compact('resultData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $client = new Client();
            // $endpoint = 'https://192.168.2.131/api.simrs/index.php/api/dokter';
            $endpoint = 'https://daftar.rsumm.co.id/api.simrs/index.php/api/dokter';
            $response = $client->get($endpoint, ['verify' => false]);
            $result = json_decode($response->getBody()->getContents(), true);
            $dokters = $result['data'];
            $polis = [
                'ANA' => 'Anak',
                'INT' => 'Penyakit Dalam',
                'ORT' => 'Orthopedi',
                'MAT' => 'Mata',
                'THT' => 'Tht-kl',
                'OBG' => 'Obgin',
                'SAR' => 'Saraf',
                'KLT' => 'Kulit dan Kelamin',
                'BED' => 'Bedah',
                'IRM' => 'Rehabilitas Medik',
                'PAR' => 'Paru',
                'URO' => 'Urologi',
                'BDM' => 'Bedah Mulut',
                'BSY' => 'Bedah Syaraf'
            ];
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning', $th->getMessage());
        }

        return view('bridging.dokter.create', compact('polis', 'dokters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'kode_dokter_rs' => 'required',
                'kode_poli' => 'required',
                'kode_dokter_bpjs' => 'required',
            ]);

            BridgingDokter::create($data);
            return redirect()->route('bridging.dokter.index')->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BridgingDokter  $bridgingDokter
     * @return \Illuminate\Http\Response
     */
    public function show(BridgingDokter $bridgingDokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BridgingDokter  $bridgingDokter
     * @return \Illuminate\Http\Response
     */
    public function edit(BridgingDokter $bridgingDokter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BridgingDokter  $bridgingDokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BridgingDokter $bridgingDokter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BridgingDokter  $bridgingDokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(BridgingDokter $bridgingDokter)
    {
        //
    }

    public function findDokter(Request $request, ReferensiRepository $referensiRepository)
    {
        $kodePoli = $request->kode_poli;

        $data =  $referensiRepository->getDpjpByKodePoli(2, date('Y-m-d'), $kodePoli);
        $data = $data['response']['list'];

        return response()->json(['data' => $data]);
    }
}
