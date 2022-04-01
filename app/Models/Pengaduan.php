<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'id_pengaduan';
    }

    public function tanggapan()
    {
        return $this->belongsTo(Tanggapan::class, 'id_pengaduan', 'id_pengaduan');
    }
}
