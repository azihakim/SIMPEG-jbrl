<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tgl_promosi',
        'jabatan_lama',
        'jabatan_baru',
        'surat_rekomendasi'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
