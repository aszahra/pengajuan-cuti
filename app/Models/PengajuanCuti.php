<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pegawai',
        'tanggal_pengajuan',
        'status',
        'keterangan',
    ];
    
    protected $table = 'pengajuancuti';

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id');
    }

    // public function cuti()
    // {
    //     return $this->belongsTo(Cuti::class, 'id_cuti', 'id');
    // }
}
