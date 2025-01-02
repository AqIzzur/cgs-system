<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $primaryKey = 'absent_id';
    protected $fillable = [
        'user_id', 'tanggal', 'status',  'login_time', 'foto', 'keterangan',
    ];

    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}

