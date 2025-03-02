<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jumlah',
    ];

    protected $table = 'jeniscuti';

    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'id_jenis_cuti');
    }
}
