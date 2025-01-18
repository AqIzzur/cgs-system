<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAsset extends Model
{
    use HasFactory;
    protected $table = 'kategori_asset';
    protected $primaryKey = 'kategori_id';
    protected $fillable = [
        'kategori_name', 'icon_path',
    ];
}
