<?php

namespace App\Http\Controllers\Anjungan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StoreSessionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = DB::connection('sqlsrv')
            ->table('PENDAFTARAN as p')
            ->join('ANTRIAN as a', 'a.No_MR', '=', 'p.No_MR')
            ->join('REGISTER_PASIEN as rp', 'rp.No_MR', '=', 'p.No_MR')
            ->where('p.No_MR', $request->no_mr) // kondisi cek no mr
            ->whereNotNull('rp.No_Identitas')   // kondisi no bpjs tidak boleh kosong 
            ->where('p.Tanggal', '2024-10-12')  // Kondisi Tanggal di PENDAFTARAN
            ->where('a.Tanggal', '2024-10-12')  // Kondisi Tanggal di ANTRIAN
            ->where('a.NamaUser', 'JKN')        // Kondisi NamaUser di ANTRIAN
            ->where('p.Medis', 'RAWAT JALAN')   // Kondisi Medis di PENDAFTARAN
            ->where('p.KodeRekanan', '032')     // Kondisi KodeRekanan di PENDAFTARAN
            ->where('p.Status', '1')            // Kondisi Status di PENDAFTARAN
            ->select('p.No_MR', 'rp.No_Identitas', 'p.Tanggal', 'p.Kode_Dokter')
            ->first();

        if (!$data) {
            // Redirect ke halaman sebelumnya dengan pesan error jika tidak ada data
            return redirect()->back()->with('error', 'Data tidak ditemukan pastikan kembali data anda sudah benar');
        }

        return view('anjungan.home', compact('data'));
        // CEK APAKAH PASIEN TERDAFTAR
        // CEK APAKAH PASIEN STATUSNYA AKTIF 1
        // CEK APAKAH PASIEN REKANAN BPJS
        // CEK APAKAH PASIEN MJKN ATAU BUKAN
        // CEK APAKAH PASIEN RAWAT JALAN


    }
}
