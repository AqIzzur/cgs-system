<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokument extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'documents';
    protected $primaryKey = 'documents_id';
    protected $fillable = [
        'title', 'deskription', 'file_path',
    ];
}
