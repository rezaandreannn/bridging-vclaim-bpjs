<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateSignature extends Controller
{
    public function index(Request $request)
    {
        $data = $request->header('X-cons-id');
        $secretKey = $request->header('X-secret-key');

        // Cek apakah header X-cons-id ada dan memiliki nilai yang benar
        if (!$data || !is_numeric($data)) {
            return response()->json(['error' => 'Header X-cons-id tidak valid.'], 400);
        }

        // Cek apakah header X-secret-key ada dan memiliki panjang yang benar
        if (!$secretKey || strlen($secretKey) !== 10) {
            return response()->json(['error' => 'Header X-secret-key tidak valid.'], 400);
        }

        date_default_timezone_set('UTC');
        $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));

        $signature = hash_hmac('sha256', $data . "&" . $tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);

        $response = [
            'X-cons-id' => $data,
            'X-timestamp' => $tStamp,
            'X-signature' => $encodedSignature,
        ];

        return response()->json($response);
    }
}
