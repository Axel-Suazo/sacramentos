<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sacramento extends Model
{
    use HasFactory;

    protected $table = 'sacramentos';

    protected $fillable = [
    'persona_id',
    'sacramento_tipo_id',
    'fecha_sacramento',
    'lugar',
    'parroquia',
    'padre',
    'madre',
    'padrino1',
    'padrino2',
    'ministro',
    'libro',
    'folio',
    'partida',
    'notas',
    'conyuge1', // 🔹 nuevo campo
    'conyuge2', // 🔹 nuevo campo
];


    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function tipo()
    {
        return $this->belongsTo(SacramentoTipo::class, 'sacramento_tipo_id');
    }
}
