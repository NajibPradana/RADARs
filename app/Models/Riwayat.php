<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    // Nama tabel di database
    protected $table = 'riwayat';

    // Primary key
    protected $primaryKey = 'riwayat_id';

    // Timestamps
    public $timestamps = true;

    // Definisi relasi
    public function arsip()
    {
        return $this->belongsTo(Arsip::class, 'arsip_id', 'arsip_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
