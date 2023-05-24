<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaEvent extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
    public function dokumentasi()
    {
        return $this->hasMany(DokumentasiEvent::class);
    }
}
