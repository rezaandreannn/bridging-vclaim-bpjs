<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBridgePolisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bridge_polis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_dokter_rs')->unique();
            $table->string('kode_poli');
            $table->string('kode_dokter_bpjs')->unique();
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
        Schema::dropIfExists('bridge_polis');
    }
}
