<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

class CreateAnjunganSepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anjungan_seps', function (Blueprint $table) {
            $table->id();
            $table->string('no_sep');
            $table->date('tgl_sep');
            $table->string('no_kartu');
            $table->string('no_mr');
            $table->string('nama');
            $table->string('poli');
            $table->string('kode_dokter');
            $table->string('nama_dokter');
            $table->enum('status', [1, 2, 3]);
            $table->string('created_by');
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('anjungan_seps');
    }
}
