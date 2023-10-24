<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelectedRujukanController extends Controller
{
    //
    public function index()
    {
        return view('pasien.selectDokter');
    }
}
