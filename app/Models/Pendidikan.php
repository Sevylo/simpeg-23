<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
   
    protected $table = 'pendidikan';

    protected $guarded = [];
    protected $fillable = [ 'id_pdk','id_pgw','t_pdk','d_pdk'];

    protected $primaryKey = 'id_pdk';

    public function pegawai(){
        return $this->belongsTo(tb_pegawai::class);
    }
}
