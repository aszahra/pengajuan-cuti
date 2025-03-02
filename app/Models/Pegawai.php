<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'kode_jabatan',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'no_hp',
        'alamat',
        'status_pegawai',
    ];
    
    protected $table = 'pegawai';
}
