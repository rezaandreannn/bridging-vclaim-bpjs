<?php

namespace App\Http\Controllers\RencanaKontrol;

use App\Http\Controllers\Controller;
use App\Repositories\RencanaKontrolRepository;
use Illuminate\Http\Request;

class DeleteRencanaKontrolController extends Controller
{
    protected $rencanaKontrolRepository;

    public function __construct(RencanaKontrolRepository $rencanaKontrolRepository)
    {
        $this->rencanaKontrolRepository = $rencanaKontrolRepository;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($noSurat)
    {
        $data = [
            'request' => [
                't_suratkontrol' => [
                    'noSuratKontrol' => $noSurat,
                    'user' => auth()->user()->name ?? 'admin'
                ]
            ]
        ];
        $deleteData = json_encode($data, true);
        $this->rencanaKontrolRepository->delete($deleteData);
        $message = 'Berhasil menghapus surat kontrol';
        return redirect()->back()->with('success', $message);
    }
}
