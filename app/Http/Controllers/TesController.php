<?php

namespace App\Http\Controllers;

use App\Services\ApiSimrsService;
use Illuminate\Http\Request;

class TesController extends Controller
{
    protected $apiSimrs;

    public function __construct()
    {
        $this->apiSimrs = new ApiSimrsService();
    }

    public function index()
    {
        $endpoint = 'index.php/api/pasien/pendaftaran';
        return $this->apiSimrs->getRequest($endpoint);
    }
}
