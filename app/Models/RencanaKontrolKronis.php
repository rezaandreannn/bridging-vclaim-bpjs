<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaKontrolKronis extends Model
{
    use HasFactory;

    protected $table = 'rencana_kontrol_kronis';
    protected $guarded = ['id'];
}
