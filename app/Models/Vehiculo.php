<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa', 'marca', 'modelo', 'year_fabricacion', 'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Contacto::class, 'cliente_id');
    }
}