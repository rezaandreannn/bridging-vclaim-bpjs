<?php

namespace Database\Seeders;

use GuzzleHttp\Client;
use App\Models\Peserta;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $endpoint = 'https://daftar.rsumm.co.id/api.simrs/index.php/api/pasien/pendaftaran';
        $response = $client->get($endpoint);
        dd($response->getStatusCode());

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents(), true);

            foreach ($data['data'] as $value) {
                $existingPeserta = Peserta::where('no_kartu', $value['No_Identitas'])->first();

                if (!$existingPeserta) {
                    // Jika belum ada, buat entri baru
                    Peserta::create([
                        'no_mr' => $value['No_MR'],
                        'no_kartu' => $value['No_Identitas'],
                        'password' => bcrypt('password')
                    ]);
                }
            }
        }
    }
}
