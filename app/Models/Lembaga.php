<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    use HasFactory;

    protected $table = 'lembaga';
    protected $primaryKey = 'lembaga_id';
    public $timestamps = true;

    public function arsips()
    {
        return $this->hasMany(Arsip::class, 'lembaga_id', 'lembaga_id');
    }

    protected $fillable = [
        'nama_lembaga',
    ];


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($lembaga) {
            // Delete related riwayats and arsips
            $lembaga->arsips->each(function ($arsip) {
                $arsip->riwayats()->delete(); // Delete related riwayats
                $arsip->delete(); // Delete the arsip itself
            });
        });
    }
}