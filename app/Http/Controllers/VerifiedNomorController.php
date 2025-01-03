<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class VerifiedNomorController extends Controller
{


    public function index()
    {
        // if (auth()->user()->hasRole('admin')) {
        //     return redirect()->route('dashboard');
        // } elseif (auth()->user()->hasRole('mr')) {
        //     return view('verify2');
        // }
    }

    public function verified(Request $request)
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
            $request->session()->put('identitas', $data['No_Identitas']);
        } else {
            $message = 'Maaf Anda Belum melakukan Pendaftaran Online';
            return redirect()->back()->withErrors(['error' => $message]);
        }

        return redirect()->route('dashboard');
    }

    public function forgetSessionIdentitas(Request $request)
    {
        $request->session()->forget('identitas');
        return redirect()->route('verify');
    }
}
