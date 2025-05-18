<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tgl_gajian',
        'gaji_pokok',
        'bonus',
        'potongan',
        'total_gaji',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class, 'user_id', 'user_id');
    }
}
