<?php

namespace App\Http\Controllers\RencanaKontrol;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;
use App\Models\RencanaKontrolKronis;
use Illuminate\Support\Facades\Route;
use App\Repositories\MonitoringRepository;

class RencanaKontrolPasienKronisController extends Controller
{

    protected $monitoringRepository;
    protected $sepRepository;

    public function __construct(MonitoringRepository $monitoringRepository, SepRepository $sepRepository)
    {
        $this->monitoringRepository = $monitoringRepository;
        $this->sepRepository = $sepRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $today = Carbon::now()->format('Y-m-d');

        $pasienKronis = RencanaKontrolKronis::whereDate('created_at', $today)->get();
        return view('rencana-kontrol.pasien-kronis.index', compact('pasienKronis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $historyKunjungan = $this->monitoringRepository->kunjungan(date('Y-m-d'), 2);
            if ($historyKunjungan['metaData']['code'] == 200) {
                $kunjungans = $historyKunjungan['response']['sep'];
            } else {
                $kunjungans = [];
            }
            //code...
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning', $th->getMessage());
        }

        return view('rencana-kontrol.pasien-kronis.create', compact('kunjungans'));
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
            'no_sep' => 'required',
            'tgl_rencana_kontrol' => 'required|date',
            'nama_peserta' => 'required',
            'nama_poli' => 'required',
            'kode_dokter' => 'required',
            'nama_dokter' => 'required',
        ]);


        RencanaKontrolKronis::create($data);
        $message = 'Berhasil menambahkan data Peserta kronis';
        return redirect()->route('rencana_kontrol.kronis.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $pasienKronis = RencanaKontrolKronis::find($id);
        return view('rencana-kontrol.pasien-kronis.edit', \compact('pasienKronis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pasienKronis = RencanaKontrolKronis::find($id);
        $pasienKronis->update([
            'no_sep' => $request->no_sep,
            'nama_poli' => $request->nama_poli,
            'tgl_rencana_kontrol' => $request->tgl_rencana_kontrol,
            'nama_dokter' => $request->nama_dokter,
        ]);

        $message = 'Edit data pasien kronis berhasil!';
        return redirect()->route('rencana_kontrol.kronis.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pasienKronis = RencanaKontrolKronis::findOrFail($id);
        $pasienKronis->delete();
        $message = 'Berhasil menghapus data pasien kronis!';
        return redirect()->route('rencana_kontrol.kronis.index')->with('success', $message);
    }

    public function fetchNoSep(Request $request)
    {
        $nomorSep = $request->no_sep;
        $sep = $this->sepRepository->findByNomor($nomorSep);

        $namaPoli = $sep['response']['poli'];
        $namaDokter = $sep['response']['dpjp']['nmDPJP'];
        $kodeDokter = $sep['response']['dpjp']['kdDPJP'];
        $namaPeserta = $sep['response']['peserta']['nama'];

        // Return the data as JSON
        return response()->json(['nama_poli' => $namaPoli, 'nama_dokter' => $namaDokter, 'kode_dokter' => $kodeDokter, 'nama_peserta' => $namaPeserta]);
    }
}
