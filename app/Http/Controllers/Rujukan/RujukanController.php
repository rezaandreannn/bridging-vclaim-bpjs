<?php

namespace App\Http\Controllers\Rujukan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RujukanRepository;


class RujukanController extends Controller
{
    /**
     * The user repository implementation.
     *
     * @var FingerPrintRepository
     */
    protected $rujukan;

    /**
     * Create a new controller instance.
     *
     * @param  RujukanRepository  $rujukan
     * @return void
     */
    public function __construct(RujukanRepository $rujukan)
    {
        $this->rujukan = $rujukan;
    }
    /**
     * Get Nomor Rujukan.
     * @param int $nomorRujukan
     * @return mixed The retrieved Rujukan data, or null if not found.
     */
    public function byNomorRujukan($nomorRujukan)
    {
    }
}
