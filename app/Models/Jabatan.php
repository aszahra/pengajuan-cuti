<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_departemen',
        'level',
    ];
    
    protected $table = 'jabatan';

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'id_departemen', 'id');
    }

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_jabatan');
    }
}
