<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanDomisili extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
        'agama', 'status_perkawinan', 'pekerjaan', 'alamat', 'kecamatan',
        'kabupaten', 'provinsi', 'foto_ktp', 'foto_kk', 'status', 'catatan_admin'
    ];
}