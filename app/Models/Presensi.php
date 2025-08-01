<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
   
    protected $table = 'presensi';

    protected $guarded = [];
    protected $fillable = [ 'id_presensi','id_pgw','tgl_absen','jmasuk','jkeluar','st_masuk','st_keluar','wkt_telat','st_kehadiran'];

    protected $primaryKey = 'id_presensi';

    public function pegawai(){
        return $this->belongsTo(tb_pegawai::class);
    }
}
