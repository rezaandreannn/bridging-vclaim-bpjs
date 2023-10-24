<?php

namespace App\Http\Controllers\Rujukan;

use App\Http\Controllers\Controller;
use App\Repositories\RujukanRepository;
use Illuminate\Http\Request;

class ListRujukanController extends Controller
{
    protected $rujukanRepository;
    public function __construct(RujukanRepository $rujukanRepository)
    {
        $this->rujukanRepository = $rujukanRepository;
    }
    public function list(Request $request)
    {
        $noKartu = $request->session()->get('nama');
        dd($noKartu);
        $response = $this->rujukanRepository->getByNomorKartu($noKartu);
    }

    public function find()
    {
    }
}
