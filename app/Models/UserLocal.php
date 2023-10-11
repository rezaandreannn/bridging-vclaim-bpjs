<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class UserLocal extends Model
{

    public function index()
    {
        return json_decode(File::get(storage_path('app/users.json')), true)['users'];
    }

    public function findUserByEmail($email)
    {
        // dd(json_decode(File::get($this->filePath), true));
        $users = json_decode(File::get(storage_path('app/users.json')), true)['users'];

        foreach ($users as $user) {
            if ($user['email'] === $email) {
                return $user;
            }
        }

        return null;
    }
}
