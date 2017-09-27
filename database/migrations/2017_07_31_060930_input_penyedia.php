<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InputPenyedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_penyedia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_rek');
            $table->string('nama_program');
            $table->string('nama_kegiatan');
            $table->string('no_spk');
            $table->string('nama_perusahaan');
            $table->date('bulan');
            $table->string('anggaran');
            $table->string('realisasi_fisik');
            $table->string('realisasi_keuangan');
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
        Schema::dropIfExists('input_penyedia');
    }
}
