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
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->increments('id_pgw');
            $table->string('nama',100);
            $table->text('alamat');
            $table->string('tmpt_lahir',100);
            $table->date('tgl_lahir');
            $table->enum('kelamin',['L','P']);
            $table->string('agama',100);
            $table->string('nope',100);
            $table->string('email',100);
            $table->string('nm_divisi',100)->index();
            $table->bigInteger('id_kantor');
            $table->string('foto',100);
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
        Schema::dropIfExists('tb_pegawai');
    }
};
