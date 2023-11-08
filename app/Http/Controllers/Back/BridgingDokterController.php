<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Models\BridgingDokter;
use Illuminate\Support\Facades\DB;
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
        $bridgingDokters = BridgingDokter::all();
        // $getPoli = DB::table('bridging_dokters')->select('kode_poli')->distinct()->get();
    
        // $dataMerge = [];
        // foreach($bridgingDokters as $bridgingDokter){
        //     foreach ($getPoli as $value) {
        //         $data =  $referensiRepository->getDpjpByKodePoli(2, date('Y-m-d'), $value->kode_poli);
        //         $data = $data['response']['list'];
        //        foreach ($data as $kode) {
        //            if($bridgingDokter->kode_dokter_bpjs == $kode['kode']){
        //               $dataMerge = [
        //                   'kode_dokter_rs' => $bridgingDokter['kode_dokter_rs'],
        //                   'kode_poli' => $bridgingDokter->kode_poli,
        //                   'kode_dokter_bpjs' => $bridgingDokter->kode_dokter_bpjs,
        //                   'nama_dokter' => $kode['nama'],
        //               ];
        //            }
        //        }
        //     }
        // }

        // dd($dataMerge);
    
        return view('bridging.dokter.index', compact('bridgingDokters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $polis = [
            'ANA' => 'Anak', 
            'INT' => 'Penyakit Dalam', 
            'ORT' => 'Orthopedi',
            'MAT' => 'Mata' 
            ];
        return view('bridging.dokter.create', compact('polis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->validate([
          'kode_dokter_rs' => 'required',
          'kode_poli' => 'required',
          'kode_dokter_bpjs' => 'required',
      ]);

      BridgingDokter::create($data);
      return redirect()->route('bridging.dokter.index')->with('success', 'Berhasil menambahkan data');
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
