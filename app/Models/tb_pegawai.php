<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_pegawai extends Model
{
    use HasFactory;
   
    protected $table = 'tb_pegawai';

    protected $guarded = [];
    protected $fillable = [ 'id_pgw','nama','alamat','tmpt_lahir','tgl_lahir','kelamin','agama','nope','email','nm_divisi','id_kantor','foto'];
    protected $primaryKey = 'id_pgw';

    public function fprint(){
        
        return $this->belongsTo(Fprint::class);

    }

    public function kantor(){
        
        return $this->belongsTo(Kantor::class);
    }

    public function divisi(){
        
        return $this->belongsTo(Divisi::class);
    }
}
