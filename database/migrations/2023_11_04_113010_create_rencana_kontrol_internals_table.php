<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRencanaKontrolInternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana_kontrol_kronis', function (Blueprint $table) {
            $table->id();
            $table->string('no_sep')->unique();
            $table->date('tgl_rencana_kontrol');
            $table->string('nama_peserta');
            $table->string('nama_poli');
            $table->string('kode_dokter');
            $table->string('nama_dokter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rencana_kontrol_kronis');
    }
}
