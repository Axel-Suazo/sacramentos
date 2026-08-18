<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SacramentoTipo extends Model
{
    use HasFactory;

    protected $table = 'sacramento_tipos';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function sacramentos()
    {
        return $this->hasMany(Sacramento::class, 'sacramento_tipo_id');
    }
}
