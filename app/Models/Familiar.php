<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    use HasFactory;

    protected $table = 'familiares';

    protected $fillable = [
        'persona_id',
        'nombre_completo',
        'parentesco',
        'telefono',
        'direccion',
        'correo',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
