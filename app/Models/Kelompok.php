<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
}
