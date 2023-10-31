<?php

namespace App\Http\Controllers\Back\SEP;

use App\Http\Controllers\Controller;
use App\Repositories\SepRepository;
use Illuminate\Http\Request;

class FindByNomorController extends Controller
{
    protected $sepRepository;

    public function __construct(SepRepository $sepRepository)
    {
        $this->sepRepository = $sepRepository;
    }

    public function index(Request $request)
    {
        $sep = [];
        if ($request->no_sep) {
            $no_sep = $request->no_sep;

            $data =  $this->sepRepository->findByNomor($no_sep);
            if ($data['metaData']['code'] == 200) {
                $sep = $data['response'];
                // dd($sep);
            } else {
                $sep = [];
                // dd($sep);
            }
        }

        return view('SEP.cari', compact('sep'));
    }
}
