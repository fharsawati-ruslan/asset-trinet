<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetLocation extends Model
{
    protected $fillable = [
        'asset_id',
        'lokasi',
        'divisi',
        'pic',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}

