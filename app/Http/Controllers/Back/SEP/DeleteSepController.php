<?php

namespace App\Http\Controllers\Back\SEP;

use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;
use App\Models\AnjunganSep;

class DeleteSepController extends Controller
{
    protected $sepRepository;

    public function __construct(SepRepository $sepRepository)
    {
        $this->sepRepository = $sepRepository;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $noSep)
    {
        $data = [
            'request' => [
                't_sep' => [
                    'noSep' => $noSep,
                    'user' => auth()->user()->name ?? 'admin'
                ]
            ]
        ];

        $delete = json_encode($data, true);
        $this->sepRepository->delete($delete);

        // DELETE DI DATABASE
        $sepByLocal = AnjunganSep::where('no_sep', $noSep)->first();
        $sepByLocal->delete();

        return redirect()->back()->with('success', 'No SEP Berhasil Di Hapus');
    }
}
