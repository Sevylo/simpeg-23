<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantor extends Model
{
    use HasFactory;
   
    protected $table = 'kantor';

    protected $guarded = [];
    protected $fillable = [ 'id_kantor','nm_wilayah'];

    protected $primaryKey = 'id_kantor';

    public function pegawai(){
        return $this->belongsTo(tb_pegawai::class);
    }
}
