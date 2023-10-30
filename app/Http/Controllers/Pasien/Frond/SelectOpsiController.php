<?php

namespace App\Http\Controllers\Pasien\Frond;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelectOpsiController extends Controller
{
    //
    public function index()
    {
        return view('pasien.opsiRujukan');
    }
}
