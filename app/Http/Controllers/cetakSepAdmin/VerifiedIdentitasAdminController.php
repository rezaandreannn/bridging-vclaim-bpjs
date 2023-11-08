<?php

namespace App\Http\Controllers\cetakSepAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerifiedIdentitasAdminController extends Controller
{
    //
    public function index()
    {
        return view('cetak-sep-admin.verify');
    }

    public function store(Request $request)
    {
        $noMr = $request->no_mr;
        $response = Http::get('https://daftar.rsumm.co.id/api.simrs/index.php/api/pasien/pendaftaran/' . $noMr);
        if ($response->status() == 200) {
            $result = json_decode($response->getBody()->getContents(), true);
            $data = $result['data'][0];
            // handle error no kartu
            if ($data['No_Identitas'] == null) {
                $message = 'No Kartu Di SimRS Kosong';
                return redirect()->back()->with('error', $message);
            } elseif (strlen($data['No_Identitas']) !== 13) {
                $message = 'No Kartu Tidak Sesuai (Harus 13 karakter)';
                return redirect()->back()->with('error', $message);
            } elseif ($data['KodeRekanan'] != '032') {
                $message = 'Peserta Terdaftar Sebagai Pasien Umum';
                return redirect()->back()->with('error', $message);
            }
            $sessionPasien = [
                'no_identitas' => $data['No_Identitas'],
                'kode_dokter_rs' => $data['Kode_Dokter'],
                'no_mr' => $data['No_MR'],
                'no_telepon' => $data['HP1']
            ];
            $request->session()->put('pasien', $sessionPasien);
        } else {
            $message = 'Mohon Maaf Anda Belum melakukan Pendaftran Online';
            return redirect()->back()->withErrors(['error' => $message]);
        }

        return redirect()->route('cetaksep.dashboard');
    }



    public function forgetSessionIdentitas(Request $request)
    {

        $request->session()->forget('pasien');
        return redirect()->route('cetak-sep-admin.verify');
    }
}
