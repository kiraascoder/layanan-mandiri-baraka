<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = ['citizen_id', 'surat_type', 'status', 'rejection_reason', 'generated_file_path'];

    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
    }
}
