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
        Schema::create('absensi', function (Blueprint $table) {
            $table->increments('id_absen',11);
            $table->UnsignedInteger('id_pgw');
            $table->string('nama',50);
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->enum('status',['Cuti','Ijin','Sakit']);
            $table->text('ket');
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
        Schema::dropIfExists('absensi');
    }
};
