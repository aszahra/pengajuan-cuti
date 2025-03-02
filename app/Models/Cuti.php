<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jenis_cuti',
        'nama',
        'jumlah_cuti',
        'sisa_cuti',
    ];
    
    protected $table = 'cuti';

    public function cuti()
    {
        return $this->belongsTo(Cuti::class, 'id_jenis_cuti', 'id');
    }
}
