<?php

namespace App\Http\Controllers\Anjungan;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FormMrController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $data = DB::connection('sqlsrv')
        //     ->table('ANTRIAN as a')
        //     ->limit(5)
        //     ->get();
        // dd($data);
        return view('anjungan.form-no_mr');
    }
}
