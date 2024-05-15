<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nama_instansi',
        'nomor_hp',
        'nomor_wa',
        'email',
        'provinsi',
        'kota_kabupaten',
        'alamat_instansi',
        'tanggal',
        'pukul',
        'topik',
        'tujuan_opd',
        'jumlah_rombongan',
        'pimpinan',
        'keterangan',
        'nomor_surat',
        'kepada',
        'surat_permohonan',
        'is_bukti_inap',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

