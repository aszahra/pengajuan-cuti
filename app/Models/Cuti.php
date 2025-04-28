<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jumlah_cuti',
        'keterangan'
    ];
    
    protected $table = 'cuti';

    public function pengajuancuti()
    {
        return $this->hasMany(PengajuanCuti::class, 'id_cuti');
    }
}
