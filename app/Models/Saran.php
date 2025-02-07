<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;

    protected $table = 'saran';

    protected $fillable = [
        'citizen_id',
        'isi_saran',
    ];

    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
    }
}
