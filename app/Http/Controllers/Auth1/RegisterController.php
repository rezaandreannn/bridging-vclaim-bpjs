<?php

namespace App\Http\Controllers\Auth1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];

        $users = json_decode(File::get(storage_path('app/users.json')), true);

        // Tambahkan data pengguna baru ke dalam array users
        $users['users'][] = $data;

        // Simpan data ke dalam file JSON
        File::put(storage_path('app/users.json'), json_encode($users));

        return "Akun Anda berhasil dibuat.";
    }
}
