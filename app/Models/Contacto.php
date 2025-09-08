<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable = ['nombre', 'apellido', 'documento_identidad', 'correo', 'telefono'];
}