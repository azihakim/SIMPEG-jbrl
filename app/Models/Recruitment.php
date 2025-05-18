<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'berkas',
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
