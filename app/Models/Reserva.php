<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'espacio_id',
        'solicitante_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'estado'
    ];

    public function espacio()
    {
        return $this->belongsTo(Espacio::class);
    }

    public function solicitante()
    {
        return $this->belongsTo(Solicitante::class);
    }
}
