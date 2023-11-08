<?php

namespace App\Http\Controllers\cetakSepAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelectOpsiAdminController extends Controller
{
    //
    public function index()
    {
        return view('cetak-sep-admin.opsiRujukan');
    }
}
