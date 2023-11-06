<?php

namespace App\Http\Controllers\SEP;

use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    protected $sepRepository;

    public function __construct(SepRepository $sepRepository)
    {
        $this->sepRepository = $sepRepository;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($noSep)
    {
        if ($noSep) {
            $sep = [];
            $data =  $this->sepRepository->findByNomor($noSep);
            if ($data['metaData']['code'] == 200) {
                $sep = $data['response'];
            } else {
                $sep = [];
            }
        }

        return view('SEP.detail', compact('sep'));
    }
}
