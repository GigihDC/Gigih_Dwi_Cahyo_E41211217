<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'daftar_dokter';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_dokter', 'spesialis', 'tahun_masuk', 'tahun_keluar'
    ];
}
