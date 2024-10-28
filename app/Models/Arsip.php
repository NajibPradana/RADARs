<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $fillable = [
        'lembaga_id',
        'user_id',
        'kode_klasifikasi',
        'nomor_identitas',
        'uraian_informasi',
        'kurun_waktu',
        'jumlah',
        'jenis_arsip',
        'retensi_aktif',
        'retensi_inaktif',
        'kondisi_asli',
        'kondisi_tekstual',
        'kondisi_baik',
        'keterangan_lain',
    ];

    protected $primaryKey = 'arsip_id'; // Menyebutkan kolom primary key jika diperlukan
    // Jika diperlukan, tambahkan relasi
    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'lembaga_id', 'lembaga_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}


