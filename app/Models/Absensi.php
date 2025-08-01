<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
   
    protected $table = 'absensi';

    protected $guarded = [];
    protected $fillable = [ 'id_absen','id_pgw','nama','tgl_mulai','tgl_selesai','status','ket'];

    protected $primaryKey = 'id_absen';

    public function pegawai(){
        return $this->belongsTo(tb_pegawai::class);
    }
}
