<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InputLra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_lra', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_rek');
            $table->string('nama_program');
            $table->string('nama_kegiatan');
            $table->date('anggaran_sebelum_perubahan');
            $table->string('anggaran_setelah_perubahan');
            $table->string('realisasi_bulan_lalu');
            $table->string('realisasi_bulan_ini');
            $table->string('sisa_pagu_anggaran');
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
        Schema::dropIfExists('input_lra');
    }
}
