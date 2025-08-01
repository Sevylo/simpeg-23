<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
   
    protected $table = 'divisi';

    protected $guarded = [];
    protected $fillable = [ 'id_divisi','nm_divisi'];

    protected $primaryKey = 'id_divisi';

    public function pegawai(){
        return $this->belongsTo(tb_pegawai::class);
    }
}
