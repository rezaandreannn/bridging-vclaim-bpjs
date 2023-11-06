<?php

namespace App\Http\Controllers\Back;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesertaController extends Controller
{
    public function index()
    {
        try {
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
        } catch (\Throwable $th) {
          return redirect()->back()->with('warning', $th->getMessage());
        }
    

        // dd($pasiens);
        return view('peserta', compact('pasiens'));
    }
}
