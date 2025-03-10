<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'tanggal_pengajuan',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'keterangan',
    ];
    
    protected $table = 'pengajuancuti';

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nip', 'nip');
    }
}
