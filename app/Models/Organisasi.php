<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
    public function kelompok()
    {
        return $this->hasMany(Kelompok::class);
    }
    public function event()
    {
        return $this->hasMany(Event::class);
    }
}
