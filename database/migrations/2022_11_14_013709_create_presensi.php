<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->increments('id_presensi',11);
            $table->UnsignedInteger('id_pgw');
            $table->date('tgl_absen');
            $table->time('jmasuk');
            $table->time('jkeluar');
            $table->enum('st_masuk',['Sudah','Belum','Tidak']);
            $table->enum('st_keluar',['Sudah','Belum','Tidak']);
            $table->timestamp('wkt_telat');
            $table->string('st_kehadiran',6);
            $table->foreign('id_pgw')->references('id_pgw')->on('tb_pegawai')->onDelete('cascade')->onUpdate('cascade');    
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
        Schema::dropIfExists('presensi');
    }
};
