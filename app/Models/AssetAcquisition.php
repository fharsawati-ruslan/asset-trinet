<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetAcquisition extends Model
{
    protected $fillable = [
        'asset_id',
        'tanggal_pembelian',
        'sumber',
        'harga',
        'jumlah',
        'satuan',
    ];

    protected $casts = [
        'tanggal_pembelian' => 'date',
        'harga' => 'decimal:2',
        'jumlah' => 'integer',
    ];

    /**
     * Relasi ke Asset
     */
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}