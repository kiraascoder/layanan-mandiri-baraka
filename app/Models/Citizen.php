<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Citizen extends Authenticatable
{
    use Notifiable;

    protected $table = 'citizens';
    protected $fillable = [
        'nik',
        'name',

        'tanggal_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'alamat',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'kewarganegaraan',
        'golongan_darah',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
