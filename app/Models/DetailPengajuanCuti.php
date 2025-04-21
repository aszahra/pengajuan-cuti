<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengajuanCuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pengajuancuti',
        'jumlah_cuti',
        'sisa_cuti',
    ];
    
    protected $table = 'detail_pengajuan_cuti';
}
