<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class user_account extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    use Notifiable;
    // protected $table = 'user_account';

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAuthIdentifierName()
{
    return 'id'; // Mengembalikan nama kolom yang digunakan untuk mengidentifikasi pengguna
}
}
