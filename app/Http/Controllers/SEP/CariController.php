<?php

namespace App\Http\Controllers\SEP;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bpjs\Bridging\Vclaim\BridgeVclaim;

class CariController extends Controller
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeVclaim();
    }



    public function index($no_sep)
    {
        $endpoint = 'SEP/' . $no_sep;
        return $this->bridging->getRequest($endpoint);
    }
}
