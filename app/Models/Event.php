<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function agenda()
    {
        return $this->hasMany(AgendaEvent::class);
    }
    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}
