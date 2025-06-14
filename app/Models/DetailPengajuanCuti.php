<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengajuanCuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pengajuan_cuti',
        'id_cuti',
        'tanggal_mulai',
        'tanggal_selesai',
        'jumlah',
        'sisa_cuti',
    ];

    protected $table = 'detail_pengajuan_cuti';
    
    // public function pengajuancuti()
    // {
    //     return $this->belongsTo(PengajuanCuti::class, 'id_pengajuan_cuti');
    // }
}
