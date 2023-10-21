<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetPasienController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            $client = new Client();
            $endpoint = 'https://daftar.rsumm.co.id/api.simrs/index.php/api/pasien/pendaftaran';
            $response = $client->get($endpoint);
            dd(\json_decode($response, true));
            $result = json_decode($response->getBody()->getContents(), true);
            foreach ($result['data'] as $value) {
                Peserta::create([
                    'no_mr' => $value['No_MR'],
                    'no_kartu' => $value['No_Identitas']
                ]);
             }
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
