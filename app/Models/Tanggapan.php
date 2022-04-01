<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $guarded = ['id_tanggapan'];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }
}
