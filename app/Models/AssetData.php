<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetData extends Model
{
    use HasFactory;
    protected $table = 'asset_data';
    protected $primaryKey = 'asset_id';
    protected $fillable = [
        'name_asset', 'file_asset' , 'kategori_asset', 'type_file', 'akses', 'user_id',
    ];
}
