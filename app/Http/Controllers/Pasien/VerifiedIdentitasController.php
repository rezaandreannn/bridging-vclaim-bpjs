<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class VerifiedIdentitasController extends Controller
{
    //
    public function index()
    {
        return view('pasien.verify');
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
                return redirect()->back()->withErrors(['error' => $message]);
            } elseif (strlen($data['No_Identitas']) !== 13) {
                $message = 'No Kartu Tidak Sesuai (Harus 13 karakter)';
                return redirect()->back()->withErrors(['error' => $message]);
            } elseif ($data['KodeRekanan'] != '032') {
                $message = 'Peserta Terdaftar Sebagai Pasien Umum';
                return redirect()->back()->withErrors(['error' => $message]);
            }
            $sessionPasien = [
                'no_identitas' => $data['No_Identitas'],
                'kode_dokter_rs' => $data['Kode_Dokter']
            ];
            $request->session()->put('pasien', $sessionPasien);
        } else {
            $message = 'No MR tidak Terdaftar';
            return redirect()->back()->withErrors(['error' => $message]);
        }

        return redirect()->route('pasien.dashboard');
    }

    public function forgetSessionIdentitas(Request $request)
    {

        $request->session()->forget('pasien');
        return redirect()->route('pasien.verify');
    }
}
