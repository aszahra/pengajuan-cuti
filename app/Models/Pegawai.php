<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'id_user',
        'id_jabatan',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'no_hp',
        'alamat',
        'status_pegawai',
    ];
    
    protected $table = 'pegawai';

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id');
    }

    public function pengajuancuti()
    {
        return $this->hasMany(PengajuanCuti::class, 'id_pegawai');
    }
}
