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
        Schema::create('p_kerja', function (Blueprint $table) {
            $table->increments('id_pkj',11);
            $table->UnsignedInteger('id_pgw');
            $table->string('nama_pkj',20);
            $table->text('det_pkj');
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
        Schema::dropIfExists('p_kerja');
    }
};
