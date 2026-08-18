<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// IMPORTS de los modelos relacionados
use App\Models\Familiar;
use App\Models\Sacramento;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'nombres',
        'apellidos',
        'documento_unico',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'telefono',
        'email',
        'direccion',
    ];

    /**
     * Una persona puede tener varios familiares (padre, madre, tutor).
     */
    public function familiares()
    {
        return $this->hasMany(Familiar::class, 'persona_id');
    }
    

    /**
     * Una persona puede tener varios sacramentos.
     */
    public function sacramentos()
    {
        return $this->hasMany(Sacramento::class, 'persona_id');
    }

    // OJO: no definimos relación con Padrino porque la tabla 'padrinos'
    // no tiene persona_id; guarda nombre libre asociado al sacramento.
}
