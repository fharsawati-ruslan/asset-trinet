<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'kategori',
        'sub_kategori', // 🔥 tambah ini
        'spesifikasi',
        'serial_number',
        'lokasi',
        'kondisi',
        'foto',
        'tanggal_masuk',
    ];

    public function location()
{
    return $this->hasOne(\App\Models\AssetLocation::class);
}
    protected static function booted()
    {
        static::creating(function ($asset) {
            if (!$asset->kode) {
                $last = self::latest()->first();

                $number = $last
                    ? ((int) substr($last->kode, 4)) + 1
                    : 1;

                $asset->kode = 'INV-' . str_pad($number, 3, '0', STR_PAD_LEFT);
            }
        });
    }
}