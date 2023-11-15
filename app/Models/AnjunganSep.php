<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnjunganSep extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $timezone = 'Asia/Jakarta';
}
