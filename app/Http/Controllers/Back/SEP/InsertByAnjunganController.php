<?php

namespace App\Http\Controllers\Back\SEP;

use App\Http\Controllers\Controller;
use App\Models\AnjunganSep;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InsertByAnjunganController extends Controller
{
    public function index()
    {

        $data = AnjunganSep::whereDate('created_at', Carbon::today())->get();
        return view('sep.insert-by-anjungan', compact('data'));
    }
}
