<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifiedIdentitasController extends Controller
{
    //
    public function index()
    {
        return view('pasien.verify');
    }

    public function store(Request $request)
    {
        // fungsi ge redirect to selest
        // return view('pasien.opsiRujukan');
    }
}
