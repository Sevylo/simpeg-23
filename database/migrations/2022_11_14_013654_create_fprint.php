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
        Schema::create('fprint', function (Blueprint $table) {
            $table->increments('id_fprint');
            $table->UnsignedInteger('id_pgw');
            $table->string('nama');
            $table->string('id_kantor');
            $table->string('scan_1');
            $table->string('scan_2');
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
        Schema::dropIfExists('fprint');
    }
};
