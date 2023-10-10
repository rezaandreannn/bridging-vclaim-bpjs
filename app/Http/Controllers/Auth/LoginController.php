<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserLocal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = new UserLocal();
        $userData = $user->findUserByEmail('andreanreza042@gmail.com');

        if ($userData && Hash::check($request->input('password'), $userData['password'])) {
            // Berhasil login
            return "Selamat datang, " . $userData['email'];
        }

        // Gagal login
        return "Login gagal. Pastikan email dan password benar.";
    }
}
