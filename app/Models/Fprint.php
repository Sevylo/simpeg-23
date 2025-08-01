<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fprint extends Model
{
    use HasFactory;
   
    protected $table = 'fprint';

    protected $guarded = [];
    protected $fillable = [ 'id_fprint','id_pgw','nama','id_kantor','scan_1','scan_2'];
    protected $primaryKey = 'id_fprint';

    public function pegawai(){
        return $this->belongsTo(tb_pegawai::class);
    }
}
