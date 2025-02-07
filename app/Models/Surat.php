<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = ['citizen_id', 'jenis_surat', 'no_surat', 'data_surat',  'no_hp', 'file_persyaratan', 'status', 'alasan_reject', 'surat_selesai'];

    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
    }
    protected $casts = [
        'data_surat' => 'array',
    ];
}
