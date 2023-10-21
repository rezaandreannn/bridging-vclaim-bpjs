<?php

namespace App\Http\Controllers\Auth;

use GuzzleHttp\Client;
use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\Auth\LoginPesertaRequest;

class AuthenticatedPesertaController extends Controller
{
      /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
     public function create()
     {
         try {
                 \Artisan::call('db:seed', [
                     '--class' => 'PesertaSeeder'
                 ]);
         } catch (\Throwable $th) {
             //throw $th;
         }
         
         return view('auth.login-peserta');
     }
 
     /**
      * Handle an incoming authentication request.
      *
      * @param  \App\Http\Requests\Auth\LoginRequest  $request
      * @return \Illuminate\Http\RedirectResponse
      */
     public function store(LoginPesertaRequest $request)
     {
         $request->authenticate();
 
         $request->session()->regenerate();
    
         return redirect()->intended(RouteServiceProvider::HOME);
     }

       /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
    
        Auth::guard('peserta')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

  
}
