<?php

namespace App\Http\Controllers\RencanaKontrol;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FindSepController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $noKartu = auth()->guard('peserta')->user()->no_kartu ?? '';

        return view('rencana-kontrol.sep-index', \compact('noKartu'));
    }
}
