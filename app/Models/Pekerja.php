<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerja extends Model
{
    use HasFactory;
   
    protected $table = 'p_kerja';

    protected $guarded = [];
    protected $fillable = ['id_pkj','id_pgw','nama_pkj','det_pkj'];

    protected $primaryKey = 'id_pkj';
    
    public function pegawai(){
        return $this->belongsTo(tb_pegawai::class);
    }
}
